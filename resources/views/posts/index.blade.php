<x-layout>
    <x-slot:title>
        Blogs
    </x-slot:title>
    <div class="center">
        <h1>Blogs</h1>

        <form method="GET" action="/posts/search">
            <div class="search-input">
                <input name="search" placeholder="Meklēt ierakstu..." value="{{ $search ?? old('search') }}" />
                <button class="search">Meklēt</button>
            </div>
        </form><br>

        <ul>
        @foreach ($posts as $post)
            <li><a href="/posts/{{ $post->id }}" class="output">{{ $post->content }}</a></li>
        @endforeach
        </ul>
    </div>
</x-layout>