@extends('layouts.layout')

@section('title', 'Categories')

@section('content')
    <div class="container mx-auto mt-5 mb-5">
        <h1 class="text-3xl font-bold mb-4 text-gray-800">Categories</h1>

        @if (session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol Create Category -->
        <form action="{{ route('categories.create') }}" method="GET" class="inline-block">
            <button type="submit"
                class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-600 transition mb-4">
                Create Category
            </button>
        </form>

        <div class="card shadow-md rounded-lg overflow-hidden">
            <div class="list-group">
                @if ($categories->count() > 0)
                    @foreach ($categories as $category)
                        <div
                            class="list-group-item flex justify-between items-center p-4 border-b border-gray-200 hover:bg-gray-50 transition">
                            <a href="{{ route('categories.show', $category->id) }}"
                                class="text-lg text-blue-600 dark:text-blue-400 hover:underline">{{ $category->name }}</a>
                            <div class="flex items-center space-x-2">

                                <!-- Tombol Edit Category -->
                                <form action="{{ route('categories.edit', $category->id) }}" method="GET">
                                    <button type="submit"
                                        class="bg-yellow-500 text-white rounded hover:bg-yellow-600 transition py-1 px-4">
                                        Edit
                                    </button>
                                </form>

                                <!-- Tombol Delete Category -->
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                    style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white rounded hover:bg-red-600 transition py-1 px-4"
                                        onclick="return confirm('Are you sure you want to delete this category?');">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="list-group-item justify-content-between align-items-center p-4">
                        <p class="text-gray-600 dark:text-gray-400">No categories available.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
