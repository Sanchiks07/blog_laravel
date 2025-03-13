<x-layout>
    <x-slot:title>
        Blogs
    </x-slot:title>
    <h1>Blogs</h1>
    <ul>
    @foreach ($posts as $post)
        <li><a href="/posts/{{ $post->id }}">{{ $post->content }}</a></li>
    @endforeach
    </ul>
</x-layout>