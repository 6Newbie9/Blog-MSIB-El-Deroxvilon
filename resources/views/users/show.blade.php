@extends('layouts.dashboard')

@section('title', 'User Details')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">User Details</h2>

    <p class="mb-4"><strong>Name:</strong> {{ $user->name }}</p>
    <p class="mb-4"><strong>Email:</strong> {{ $user->email }}</p>

    <a href="{{ route('users.index') }}" class="inline-block bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded hover:bg-gray-400 transition mb-4">Back</a>
    <a href="{{ route('users.edit', $user) }}" class="inline-block bg-yellow-500 text-white font-semibold py-2 px-4 rounded hover:bg-yellow-600 transition mb-4">Edit User</a>

    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="inline-block bg-red-500 text-white font-semibold py-2 px-4 rounded hover:bg-red-600 transition mb-4" onclick="return confirm('Are you sure you want to delete this user?');">Delete User</button>
    </form>
</div>
@endsection
