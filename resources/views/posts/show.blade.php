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

    <form method="POST" action="/comments">
        @csrf

        <input name="post_id" value="{{ $post->id }}" type="hidden" />

        <label>
            Autors:
            <input name="author" />
        </label>
        @error("author")
            <p>{{ $message }}</p>
        @enderror<br>

        <br><label>
            Komentārs:
            <input name="comment" />
        </label>
        @error("comment")
            <p>{{ $message }}</p>
        @enderror<br>

        <br><br>
        <button type="submit">Komentēt</button>
    </form>

    @foreach ($post->comments as $comment)
        <form method="POST" action="/comments/{{ $comment->id }}">
            @csrf
            @method("delete")

            <h2>{{ $comment->comment }}</h2>
            <p>{{ $comment->created_at }}</p>
            <p>{{ $comment->author }}</p>

            <a href="/comments/{{ $comment->id }}/edit">Rediģēt</a>
            <button>Dzēst</button>
        </form>
    @endforeach
    
</x-layout>