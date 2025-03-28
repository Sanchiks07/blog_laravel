<x-layout>
    <x-slot:title>
        {{ $category->category_name }}
    </x-slot:title>
    <div class="center">
        <h1>{{ $category->category_name }}</h1>

        <div class="actions">
            <a class="edit" href="/categories/{{ $category->id }}/edit">Rediģēt</a><br>

            <form method="POST" action="/categories/{{ $category->id }}">
                @csrf
                @method("delete")
                <button class="delete">Dzēst</button>
            </form>
        </div>
    </div>
</x-layout>