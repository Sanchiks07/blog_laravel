<x-layout>
    <x-slot:title>
        {{ $post->content }}
    </x-slot:title>
    <h1>{{ $post->content }}</h1>
    <p>{{ $post->category->category_name }}</p>

    <a class="edit" href="/posts/{{ $post->id }}/edit">Rediģēt</a><br>

    <form method="POST" action="/posts/{{ $post->id }}">
        @csrf
        @method("delete")
        <button>Dzēst</button>
    </form><br>

    <p class="komentari">Komentāri</p>


    <form method="POST" action="">
        <label>
            Autors:
            <input name="author" />
        </label>

        @error("author")
            <p>{{ $message }}</p>
        @enderror<br>

        <br><br>
        <label>
            Komentārs:
            <input name="comment" />
        </label>

        @error("comment")
            <p>{{ $message }}</p>
        @enderror<br>

        <br><br>
        <button>Komentēt</button>
    </form>
</x-layout>