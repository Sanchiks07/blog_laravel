<x-layout>
    <x-slot:title>
        Rediģēt kategoriju
    </x-slot:title>
    <div class="center">
        <h1>Rediģēt kategoriju: "{{ $category->category_name }}"</h1>
        <form method="POST" action="/categories/{{ $category->id }}">
            @csrf
            @method('PUT')
            
            <label>
                Kategorija:<br>
                <input name="category_name" value="{{ $category->category_name }}" />
            </label>

            @error("category_name")
            <p>{{ $message }}</p>
            @enderror<br><br>

            <br><button>Saglabāt</button>
        </form>
    </div>
</x-layout>