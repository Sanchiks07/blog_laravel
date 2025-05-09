<x-layout>
    <x-slot:title>
        Izveidot ierakstu
    </x-slot:title>
    <div class="center">
        <h1>Izveidot ierakstu</h1>
        <p>
            Kā tu šodien jūties?<br>
            Par ko tu domā?<br>
            Kāds ir šodienas "daily meme"?<br>
            Kādu jaunu faktu uzzināji?
        </p>
        <br>
        <form method="POST" action="/posts">
            @csrf

            <div class="post-input">
                <label>
                    Ieraksts
                    <textarea name="content" placeholder="Ieraksti savas domas..."></textarea>
                </label><br>
            </div>

            @error("content")
                <p>{{ $message }}</p>
            @enderror<br>

            <div class="post-select">
                <label>
                    Kategorija
                    <select name="category_id">
                        <option value="">Bez kategorijas</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                            {{ $category->category_name }} 
                            </option>
                        @endforeach
                    </select>
                </label><br>
            </div>

            @error("category_id")
                <p>{{ $message }}</p>
            @enderror<br>

            <button type="submit" class="save">Saglabāt</button>
        </form>
    </div>
</x-layout>