@extends('layouts.layout')

@section('title', 'Edit Category')

@section('content')
    <div class="card mb-4 p-4 rounded shadow w-[70%] mt-[6%] mx-auto">
        <h1 class="text-2xl font-bold mb-6">Edit Category</h1>
        @if (session('error'))
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('categories.index') }}" method="GET" class="inline-block mb-4">
            <button type="submit"
                class="bg-gray-200 text-gray-700 font-semibold py-2 px-4 rounded hover:bg-gray-300 transition">
                Back
            </button>
        </form>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
                <strong class="font-bold">Oops!</strong>
                <span class="block sm:inline">There were some problems with your input:</span>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.update', $category->id) }}" method="POST"
            class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') ?? $category->name }}"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
            </div>
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <input type="text" name="description" id="description"
                    value="{{ old('description') ?? $category->description }}"
                    class="mt-1 block w-full p-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
            </div>
            <button type="submit"
                class="w-full bg-blue-500 text-white font-semibold py-2 rounded-lg hover:bg-blue-600 transition">Update</button>
        </form>
    </div>
@endsection
