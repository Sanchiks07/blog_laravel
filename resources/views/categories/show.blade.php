<x-layout>
    <x-slot:title>
        {{ $category->category_name }}
    </x-slot:title>
    <h1>{{ $category->category_name }}</h1>

    <a class="edit" href="/categories/{{ $category->id }}/edit">Rediģēt</a><br>

    <form method="POST" action="/categories/{{ $category->id }}">
        @csrf
        @method("delete")
        <button>Dzēst</button>
    </form>
</x-layout>