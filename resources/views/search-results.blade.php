@extends('layouts.dashboard')
@section('content')
<div class="container mx-auto mt-4">
    <div class="card mb-4 p-4 rounded shadow">
        <div class="mb-2 text-xl font-bold">Search</div>
        <form action="{{ route('search') }}" method="GET" class="flex">
            <input name="query" class="flex-grow p-2 border rounded-l" type="text"
                placeholder="Enter search term..." />
            <button type="submit" class="p-2 bg-blue-600 text-white rounded-r hover:bg-blue-800">Go!</button>
        </form>
    </div>
    <h1 class="text-2xl font-bold mb-4">Search Results for "{{ $query }}"</h1>

    <!-- Display Categories -->
    <div class="mb-4">
        <h2 class="text-xl font-bold">Categories</h2>
        @if ($categories->count() > 0)
            <ul class="list-disc pl-5">
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('categories.show', $category->id) }}" class="text-blue-600 hover:underline">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No categories found.</p>
        @endif
    </div>

    <!-- Display Posts -->
    <div class="mb-4">
        <h2 class="text-xl font-bold">Posts</h2>
        @if ($posts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($posts as $post)
                    <div class="card mb-4 rounded overflow-hidden shadow">
                        <a href="{{ route('posts.show', $post->id) }}">
                            <img class="w-full max-h-[20rem] object-cover"
                                 src="{{ $post->image ? asset('storage/' . $post->image) : 'https://via.placeholder.com/700x350' }}" 
                                 alt="{{ $post->title }}" />
                        </a>
                        <div class="p-4">
                            <div class="text-sm text-gray-500">{{ $post->created_at->format('F j, Y') }}</div>
                            <h2 class="text-xl font-bold mt-2">
                                <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                            </h2>
                            <p class="text-gray-700">{{ Str::limit($post->content, 100) }}</p>
                            <a class="text-blue-600 hover:underline" href="{{ route('posts.show', $post->id) }}">Read more →</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No posts found.</p>
        @endif
    </div>
</div>
@endsection
