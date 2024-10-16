@extends('layouts.dashboard')

@section('title', 'Create User')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">Create User</h2>

    @if (session('error'))
        <div class="bg-red-500 text-white p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name:</label>
            <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded" required>
            @error('name')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email:</label>
            <input type="email" name="email" id="email" class="w-full px-4 py-2 border rounded" required>
            @error('email')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password:</label>
            <input type="password" name="password" id="password" class="w-full px-4 py-2 border rounded" required>
            @error('password')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full px-4 py-2 border rounded" required>
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 transition">Create User</button>
            <a href="{{ route('users.index') }}" class="ml-4 bg-gray-500 text-white font-semibold py-2 px-4 rounded hover:bg-gray-600 transition">Cancel</a>
        </div>
    </form>
</div>
@endsection
