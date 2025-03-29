<x-layout>
    <x-slot:title>
        Izveidot kategoriju
    </x-slot:title>
    <div class="center">
        <h1>Izveidot kategoriju</h1>
        <form method="POST" action="/categories">
            @csrf

            <div class="category-input-group">
                <label>
                    Kategorija<br>
                    <input name="category_name" />
                </label><br>
            </div>

            @error("category_name")
                <p>{{ $message }}</p>
            @enderror<br>

            <button class="save">Saglabāt</button>
        </form>
    </div>
</x-layout>