<x-layout>
    <x-slot:title>
        Kategorijas
    </x-slot:title>
    <div class="center">
        <h1>Kategorijas</h1>
        <ul>
        @foreach ($categories as $category)
            <li><a href="/categories/{{ $category->id }}" class="output">{{ $category->category_name }}</a></li>
        @endforeach
        </ul>
    </div>
</x-layout>