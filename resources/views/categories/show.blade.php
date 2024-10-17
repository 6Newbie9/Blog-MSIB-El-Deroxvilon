@extends('layouts.layout')

@section('title', 'Category Details')

@section('content')
    <div class="container mx-auto p-4 mt-5">
        <h1 class="text-2xl font-bold mb-4">{{ $category->name }}</h1>
        <p class="mb-4">{{ $category->description }}</p>

        <form action="{{ route('categories.index') }}" method="GET" class="inline-block mb-4">
            <button type="submit" class="bg-gray-200 text-gray-700 font-semibold py-2 px-4 rounded hover:bg-gray-300 transition">
                Back
            </button>
        </form>
    </div>
@endsection
