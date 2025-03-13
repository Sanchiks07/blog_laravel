<x-layout>
    <x-slot:title>
        Izveidot ierakstu
    </x-slot:title>
    <h1>Izveidot ierakstu</h1>
    <p>
        Kā tu šodien jūties?<br>
        Par ko tu domā?<br>
        Kāds ir šodienas "daily meme"?<br>
        Kādu jaunu faktu uzzināji?
    </p>
    <form method="POST" action="/posts">
        @csrf

        <label>
            Content:<br><textarea name="content" rows="5" cols="30"></textarea>
        </label><br>

        @error("content")
            <p>{{ $message }}</p>
        @enderror
        <label>
            Kategorija:
            <select name="category_id">
                <option value="0">Bez kategorijas</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                    {{ $category->category_name }} 
                    </option>
                @endforeach
            </select>
        </label>

        <br><button>Saglabāt</button>
    </form>
</x-layout>