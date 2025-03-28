<x-layout>
    <x-slot:title>
        Rēdiģē komentāru
    </x-slot:title>
    <div class="center">
        <h3>Rediģēt komentāru</h3>
        <form method="POST" action="/comments/{{ $comment->id }}">
            @csrf
            @method("put")

            <label>
                Komentārs:
                <input name="comment" value="{{ $comment->comment }}"/>
            </label>
            @error("comment")
                <p>{{ $message }}</p>
            @enderror<br>

            <br><label>
                Autors:
                <input name="author" value="{{ $comment->author }}"/>
            </label>
            @error("author")
                <p>{{ $message }}</p>
            @enderror<br>

            <br>
            <button type="submit">Saglabāt</button>
        </form>
    </div>
</x-layout>