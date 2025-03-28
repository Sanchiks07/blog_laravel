<x-layout>
    <x-slot:title>
        Blogs
    </x-slot:title>
    <div class="center">
        <h1>Blogs</h1>
        <ul>
        @foreach ($posts as $post)
            <li><a href="/posts/{{ $post->id }}" class="output">{{ $post->content }}</a></li>
        @endforeach
        </ul>
    </div>
</x-layout>