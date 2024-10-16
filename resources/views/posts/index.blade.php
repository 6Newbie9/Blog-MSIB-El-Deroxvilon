@extends('layouts.dashboard')

@section('title', 'Posts')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Posts</h1>
        <a href="{{ route('posts.create') }}" class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition mb-4">Create Post</a>

        <div class="bg-white shadow-md rounded-lg p-4">
            @if ($posts->count() > 0)
                @foreach ($posts as $post)
                    <div class="flex justify-between items-center p-4 border-b">
                        <div class="flex items-center">
                            @if ($post->image)
                                <img src="{{ asset('storage/'.$post->image) }}" alt="Post image" class="w-24 h-24 object-cover rounded-lg me-4">
                            @else
                                <img src="https://via.placeholder.com/100" alt="Default Image" class="w-24 h-24 object-cover rounded-lg me-4">
                            @endif

                            <div>
                                <h6 class="text-lg font-semibold">
                                    <a href="{{ route('posts.show', $post->id) }}" class="hover:underline">{{ $post->title }}</a>
                                </h6>
                                <p class="text-gray-600">in category <span class="font-semibold">{{ $post->category->name }}</span></p>
                                <p>
                                    Status:
                                    <span class="badge {{ $post->is_published ? 'bg-green-500 text-white' : 'bg-gray-400 text-white' }} px-2 py-1 rounded">
                                        {{ $post->is_published ? 'Published' : 'Draft' }}
                                    </span>
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex-shrink-0">
                            <a href="{{ route('posts.edit', $post->id) }}" class="inline-block bg-yellow-500 text-white font-semibold py-1 px-3 rounded hover:bg-yellow-600 transition">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm bg-red-500 text-white rounded hover:bg-red-600 transition py-1 px-4" onclick="return confirm('Are you sure you want to delete this post?');">
                                    Delete
                                </button>
                            </form>
                        </div>
                        
                    </div>
                @endforeach
            @else
                <div class="p-4 text-center">
                    <p class="text-gray-500">No posts available.</p>
                </div>
            @endif
        </div>
    </div>
@endsection
