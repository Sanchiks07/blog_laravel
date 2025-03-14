<x-layout>
    <x-slot:title>
        Izveidot kategoriju
    </x-slot:title>
    <h1>Izveidot kategoriju</h1>
    <form method="POST" action="/categories">
        @csrf

        <label>
            Kategorija:<br>
            <input name="category_name" />
        </label><br>

        @error("category_name")
            <p>{{ $message }}</p>
        @enderror

        <br><button>Saglabāt</button>
    </form>
</x-layout>