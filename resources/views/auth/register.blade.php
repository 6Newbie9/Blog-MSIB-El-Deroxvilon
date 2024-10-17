@extends('layouts.guest')

@section('content')
    <div class="card mb-4 p-4 rounded shadow w-[70%] mt-[10%] mx-auto">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium">
                    {{ __('Name') }}
                </label>
                <input id="name" type="text" name="name"
                    class="block w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-gray-100"
                    :value="old('name')" required autofocus autocomplete="name" />
                <p class="text-sm text-red-500 mt-2">
                    @error('name')
                        {{ $message }}
                    @enderror
                </p>
            </div>

            <!-- Email Address -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium">
                    {{ __('Email') }}
                </label>
                <input id="email" type="email" name="email"
                    class="block w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-gray-100"
                    :value="old('email')" required autocomplete="username" />
                <p class="text-sm text-red-500 mt-2">
                    @error('email')
                        {{ $message }}
                    @enderror
                </p>
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium">
                    {{ __('Password') }}
                </label>
                <input id="password" type="password" name="password"
                    class="block w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-gray-100"
                    required autocomplete="new-password" />
                <p class="text-sm text-red-500 mt-2">
                    @error('password')
                        {{ $message }}
                    @enderror
                </p>
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium">
                    {{ __('Confirm Password') }}
                </label>
                <input id="password_confirmation" type="password" name="password_confirmation"
                    class="block w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-gray-100"
                    required autocomplete="new-password" />
                <p class="text-sm text-red-500 mt-2">
                    @error('password_confirmation')
                        {{ $message }}
                    @enderror
                </p>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('login') }}">
                    {{ __('Sudah memiliki akun? ingin Login') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
                <a href="{{ url('/') }}" class="ml-3 inline-flex items-center bg-gray-200 text-gray-700 font-bold py-1 px-7 rounded hover:bg-gray-300 transition">
                    {{ __('Back') }}
                </a>
            </div>
        </form>
    </div>
@endsection
