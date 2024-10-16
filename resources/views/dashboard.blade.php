@extends('layouts.dashboard')
@section('content')

    <body>
        <!-- Page header with logo and tagline-->
        <header class="py-20 bg-cover bg-center text-white"
            style="background-image: url('https://img.freepik.com/free-photo/cityscape-anime-inspired-urban-area_23-2151028624.jpg?t=st=1728976697~exp=1728980297~hmac=d5045f2f8fc6eb04158ba9bcb183a4796f8aa39ff91d657481fa6e54c03f7c10&w=1380');">
            <div class="container mx-auto text-center">
                <h1 class="text-4xl font-bold">Welcome to Blog Home!</h1>
                <p class="text-xl mt-3">A Tailwind CSS starter layout for your next blog homepage</p>
            </div>
        </header>
        
        <!-- Page content-->
        <div class="container mx-auto p-5">
            <div class="grid grid-cols-1">
                <!-- Search widget-->
                <div class="card mb-4 p-4 rounded shadow">
                    <div class="mb-2 text-xl font-bold">Search</div>
                    <div class="flex">
                        <input class="flex-grow p-2 border rounded-l" type="text" placeholder="Enter search term..." />
                        <button class="p-2 bg-blue-600 text-white rounded-r hover:bg-blue-800">Go!</button>
                    </div>
                </div>

                <!-- Categories widget -->
                <div class="card mb-4 p-4 rounded shadow">
                    <div class="mb-2 text-xl font-bold">Categories</div>
                    <div class="grid grid-cols-5">
                        @foreach ($categories->chunk(1) as $chunk)
                            <!-- Membagi kategori menjadi 3 kolom -->
                            <ul class="space-y-1">
                                @foreach ($chunk as $category)
                                    <li>
                                        <a href="{{ route('categories.show', $category->id) }}"
                                            class="text-blue-600 hover:underline mb-4">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endforeach
                    </div>
                </div>

                <h1 class="text-2xl font-bold mb-4">Posts</h1>
                <!-- Blog post entries -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @if ($posts->count() > 0)
                        @foreach ($posts as $post)
                            <div class="card mb-4 rounded overflow-hidden shadow">
                                @if ($post->image)
                                    <a href="{{ route('posts.show', $post->id) }}">
                                        <img class="w-full" src="{{ asset('storage/' . $post->image) }}"
                                            alt="{{ $post->title }}" />
                                    </a>
                                @else
                                    <a href="{{ route('posts.show', $post->id) }}">
                                        <img class="w-full" src="https://via.placeholder.com/700x350" alt="Default Image" />
                                    </a>
                                @endif

                                <div class="p-4">
                                    <div class="text-sm text-gray-500">{{ $post->created_at->format('F j, Y') }}</div>
                                    <h2 class="text-xl font-bold mt-2">
                                        <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                                    </h2>
                                    <p class="text-gray-700">{{ Str::limit($post->content, 100) }}</p>
                                    <a class="text-blue-600 hover:underline"
                                        href="{{ route('posts.show', $post->id) }}">Read more →</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-span-3 text-center">
                            <p>No posts available.</p>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    @endsection
