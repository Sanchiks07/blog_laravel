<x-layout>
    <x-slot:title>
        {{ $post->content }}
    </x-slot:title>
    <h1>{{ $post->content }}</h1>
    <p>{{ $post->category->category_name ?? "Nav kategorijas" }}</p>

    <a class="edit" href="/posts/{{ $post->id }}/edit">Rediģēt</a>

    <form method="POST" action="/posts/{{ $post->id }}">
        @csrf
        @method("delete")
        <button class="delete">Dzēst</button>
    </form>

    <!-- izveido komentāru -->
    <h3>Komentēt</h3>
    <form method="POST" action="/comments">
        @csrf

        <input name="post_id" value="{{ $post->id }}" type="hidden" />

        <label>
            Komentārs:
            <input name="comment" />
        </label>
        @error("comment")
            <p>{{ $message }}</p>
        @enderror<br>

        <br><label>
            Autors:
            <input name="author" />
        </label>
        @error("author")
            <p>{{ $message }}</p>
        @enderror<br>

        <br>
        <button type="submit" class="save">Saglabāt</button>
    </form><br>

    <!-- izvada komentārus -->
    <h3>Komentāri</h3>
    @foreach ($post->comments as $comment)
        <form method="POST" action="/comments/{{ $comment->id }}">
            @csrf
            @method("delete")

            <p><strong>{{ $comment->comment }}</strong></p>
            <p>{{ $comment->author }}</p>
            <p>{{ $comment->created_at }}</p>

            <a href="/comments/{{ $comment->id }}/edit" class="edit">Rediģēt</a>
            <button class="delete">Dzēst</button>
        </form>
    @endforeach
    
</x-layout>