@extends('layouts.layout')

@section('content')
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Users</h2>
            <a href="{{ route('users.create') }}"
                class="inline-block bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg shadow hover:bg-blue-600 transition duration-300">
                Add User
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-6 shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-lg overflow-hidden">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-3 px-6 text-left font-medium text-gray-600 uppercase tracking-wider">Name</th>
                        <th class="py-3 px-6 text-left font-medium text-gray-600 uppercase tracking-wider">Email</th>
                        <th class="py-3 px-6 text-center font-medium text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-50 transition duration-300">
                            <td class="py-4 px-6 text-gray-800">{{ $user->name }}</td>
                            <td class="py-4 px-6 text-gray-800">{{ $user->email }}</td>
                            <td class="py-4 px-6 text-center">
                                <a href="{{ route('users.show', $user) }}"
                                    class="text-blue-500 hover:text-blue-700 font-semibold mr-3">View</a>
                                <a href="{{ route('users.edit', $user) }}"
                                    class="text-yellow-500 hover:text-yellow-700 font-semibold mr-3">Edit</a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-500 hover:text-red-700 font-semibold"
                                        onclick="return confirm('Are you sure?');">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
