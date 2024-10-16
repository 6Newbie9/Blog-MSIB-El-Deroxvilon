@extends('layouts.dashboard')

@section('title', 'Category Details')

@section('content')
    <div class="container mx-auto p-4 mt-5">
        <h1 class="text-2xl font-bold mb-4">{{ $category->name }}</h1>
        <p class="mb-4">{{ $category->description }}</p>

        <a href="{{ route('categories.index') }}" class="inline-block bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded hover:bg-gray-400 transition mb-4">Back</a>
    </div>
@endsection
