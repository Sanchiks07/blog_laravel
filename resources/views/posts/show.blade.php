<x-layout>
    <x-slot:title>
        {{ $post->content }}
    </x-slot:title>
    <div class="center">
        <h1>{{ $post->content }}</h1>
        <p>Kategorija: {{ $post->category->category_name ?? "Nav kategorijas" }}</p>

        <div class="actions">
            <a class="edit" href="/posts/{{ $post->id }}/edit">Rediģēt</a>

            <form method="POST" action="/posts/{{ $post->id }}">
                @csrf
                @method("delete")
                <button class="delete">Dzēst</button>
            </form>
        </div><br>

        <div class="comment-section">
            <!-- izveido komentāru -->
            <div class="create-comment">
                <h2>Komentēt</h2>
                <form method="POST" action="/comments" class="comment-form">
                    @csrf

                    <input name="post_id" value="{{ $post->id }}" type="hidden" />

                    <label>
                        Komentārs<br>
                        <textarea name="comment"></textarea>
                    </label>
                    @error("comment")
                        <p>{{ $message }}</p>
                    @enderror<br>

                    <br><label>
                        Autors<br>
                        <input name="author" />
                    </label>
                    @error("author")
                        <p>{{ $message }}</p>
                    @enderror<br>

                    <br>
                    <button type="submit" class="save">Saglabāt</button>
                </form><br>
            </div>

            <div class="comments-list">
                <!-- izvada komentārus -->
                <h2>Komentāri</h2>
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
            </div>
        </div>
    </div>
</x-layout>