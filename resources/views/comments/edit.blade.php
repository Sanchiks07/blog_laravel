<x-layout>
    <x-slot:title>
        Rēdiģē komentāru
    </x-slot:title>
    <div class="center">
        <h1>Rediģēt komentāru</h1>
        <form method="POST" action="/comments/{{ $comment->id }}">
            @csrf
            @method("put")

            <div class="comment-input-group">
                <label>
                    Komentārs
                    <input name="comment" value="{{ $comment->comment }}"/>
                </label>
            </div>
            @error("comment")
                <p>{{ $message }}</p>
            @enderror<br>

            <div class="comment-input-group">
                <br><label>
                    Autors
                    <input name="author" value="{{ $comment->author }}"/>
                </label>
            </div>
            @error("author")
                <p>{{ $message }}</p>
            @enderror<br>

            <br>
            <button type="submit" class="save">Saglabāt</button>
        </form>
    </div>
</x-layout>