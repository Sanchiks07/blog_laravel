<x-layout>
    <x-slot:title>
        Rediģēt ierakstu
    </x-slot:title>
    <h1>Rediģēt ierakstu: "{{ $post->content }}"</h1>
    <form method="POST" action="/posts/{{ $post->id }}">
        @csrf
        @method('PUT')
        
        <label>
            Content:<br>
            <input name="content" value="{{ $post->content }}" />
        </label>

        @error("content")
        <p>{{ $message }}</p>
        @enderror<br><br>

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
        </label><br>

        @error("category_id")
            <p>{{ $message }}</p>
        @enderror

        <br><button>Saglabāt</button>
    </form>
</x-layout>