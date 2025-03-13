<x-layout>
    <x-slot:title>
        Kategorijas
    </x-slot:title>
    <h1>Kategorijas</h1>
    <ul>
    @foreach ($categories as $category)
        <li><a href="/categories/{{ $category->id }}">{{ $category->category_name }}</a></li>
    @endforeach
    </ul>
</x-layout>