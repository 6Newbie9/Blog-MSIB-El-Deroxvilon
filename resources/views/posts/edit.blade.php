@extends('layouts.layoutpost')

@section('title', 'Edit Post')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Edit Post</h2>

        @if (session('error'))
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-gray-700">Title:</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                    class="w-full px-4 py-2 border rounded">
                @error('title')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="content" class="block text-gray-700">Content:</label>
                <textarea name="content" id="content" rows="5" class="w-full px-4 py-2 border rounded">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="category_id" class="block text-gray-700">Category:</label>
                <select name="category_id" id="category_id" class="w-full px-4 py-2 border rounded">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="author_id" class="block text-gray-700">Author:</label>
                <select name="author_id" id="author_id" class="w-full px-4 py-2 border rounded">
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}"
                            {{ old('author_id', $post->author_id) == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
                @error('author_id')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image:</label>
                <input type="file" name="image" id="image" class="w-full px-4 py-2 border rounded">
                <p class="text-gray-600 mt-2">Current Image: <img src="{{ asset('storage/' . $post->image) }}"
                        width="100"></p>
                @error('image')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="is_published" class="block text-gray-700">Status:</label>
                <select name="is_published" id="is_published" class="w-full px-4 py-2 border rounded">
                    <option value="1" {{ old('is_published', $post->is_published) ? 'selected' : '' }}>Publish
                    </option>
                    <option value="0" {{ !old('is_published', $post->is_published) ? 'selected' : '' }}>Draft</option>
                </select>
            </div>

            <div>
                <button type="submit"
                    class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition">Update
                    Post</button>
                <a href="{{ route('posts.index') }}" class="ml-2 inline-block text-gray-500">Cancel</a>
            </div>
        </form>
    </div>
@endsection
