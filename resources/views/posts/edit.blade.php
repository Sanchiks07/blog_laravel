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
            Category:
            <select name="category_id">
                <option value="0">No category</option>
            </select>
        </label>
        
        @error("category_id")
        <p>{{ $message }}</p>
        @enderror<br>

        <br><button>Saglabāt</button>
    </form>
</x-layout>