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
                <form method="POST" action="/comments" class="comment-form">
                    @csrf

                    <input name="post_id" value="{{ $post->id }}" type="hidden" />

                    <div class="comment-input">
                        <label for="comment">
                            Komentārs
                            <textarea name="comment" placeholder="Ieraksti savu komentāru..."></textarea>
                        </label>
                    </div>

                    @error("comment")
                        <p>{{ $message }}</p>
                    @enderror<br>

                    <div class="comment-input">
                        <label for="author">
                            Autors
                            <input name="author" />
                        </label>
                    </div>

                    @error("author")
                        <p>{{ $message }}</p>
                    @enderror<br><br>

                    <button type="submit" class="save">Komentēt</button>
                </form><br>
            </div>

            <!-- izvada komentārus -->
            <div class="comments-list">
                <h2>Komentāri</h2>
                <div class="comment-list-items">
                    @foreach ($post->comments as $comment)
                        <form method="POST" action="/comments/{{ $comment->id }}">
                            @csrf
                            @method("delete")

                            <p><strong>{{ $comment->comment }}</strong></p>
                            <p>{{ $comment->author }}</p>
                            <p>{{ $comment->created_at->timezone('Europe/Riga')->format('Y-m-d H:i:s') }}</p>

                            <div class="actions">
                                <a href="/comments/{{ $comment->id }}/edit" class="edit">Rediģēt</a>
                                <button class="delete">Dzēst</button>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout>