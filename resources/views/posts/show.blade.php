@extends('layouts.layoutpost')

@section('title', 'Post Details')

@section('content')
    <div class="container mx-auto p-4 mt-5">
        <h1 class="text-2xl font-bold mb-4">{{ $post->title }}</h1>

        @if($post->image)
            <div class="flex justify-center mb-4" style="height: 300px;"> <!-- Set height here -->
                <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="h-full w-auto rounded">
            </div>        
        @endif
        
        <p class="mb-4">{{ $post->content }}</p>
        
        <div class="mb-4">
            <strong>Status:</strong> 
            {{ $post->is_published ? 'Published' : 'Draft' }}
        </div>

        <div class="mb-4">
            <strong>Category:</strong> 
            <a href="{{ route('categories.show', $post->category_id) }}" class="text-blue-600 hover:underline">
                {{ $post->category->name }}
            </a>
        </div>

        <div class="mb-4">
            <strong>Author:</strong> 
            <span class="text-blue-600">{{ $post->author->name }}</span> <!-- Menampilkan author -->
        </div>

        <a href="{{ route('posts.index') }}" class="inline-block bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded hover:bg-gray-400 transition mb-4">Back to Posts</a>
    </div>
@endsection
