@extends('layouts.guestapp')

@section('content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="card mb-4 p-4 rounded shadow w-[70%] mt-[10%] mx-auto">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium">
                    {{ __('Email') }}
                </label>
                <input id="email" type="email" name="email"
                    class="block w-full mt-2 p-2 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:bg-gray-800 dark:text-gray-100"
                    :value="old('email')" required autofocus autocomplete="username" />
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
                    required autocomplete="current-password" />
                <p class="text-sm text-red-500 mt-2">
                    @error('password')
                        {{ $message }}
                    @enderror
                </p>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                        name="remember">
                    <span class="ms-2">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('register'))
                    <a class="underline text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('register') }}">
                        {{ __('Belum memiliki akun? ingin Register') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
                <a href="{{ url('/') }}" class="ml-3 inline-flex items-center bg-gray-200 text-gray-700 font-bold py-1 px-4 rounded hover:bg-gray-300 transition">
                    {{ __('Back') }}
                </a>
            </div>
        </form>
    </div>
@endsection
