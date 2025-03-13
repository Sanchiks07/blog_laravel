<x-layout>
    <x-slot:title>
        Izveidot kategoriju
    </x-slot:title>
    <h1>Izveidot kategoriju</h1>
    <form method="POST" action="/posts">
        @csrf

        <label>
            Category:<br><textarea name="category_name" rows="5" cols="30"></textarea>
        </label><br>

        @error("category_name")
            <p>{{ $message }}</p>
        @enderror

        <br><button>Saglabāt</button>
    </form>
</x-layout>