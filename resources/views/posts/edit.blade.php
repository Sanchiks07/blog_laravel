<x-layout>
    <x-slot:title>
        Rediģēt ierakstu
    </x-slot:title>
    <div class="center">
        <h1>Rediģēt ierakstu: "{{ $post->content }}"</h1>
        <form method="POST" action="/posts/{{ $post->id }}">
            @csrf
            @method('PUT')
            
            <div class="post-input-group">
                <label>
                    Ieraksts
                    <textarea name="content">{{ $post->content }}</textarea>
                </label>
            </div>

            @error("content")
            <p>{{ $message }}</p>
            @enderror<br><br>

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
            @enderror

            <br><button>Saglabāt</button>
        </form>
    </div>
</x-layout>