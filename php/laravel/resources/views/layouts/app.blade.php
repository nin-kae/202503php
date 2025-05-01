<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(to right, #ff9a9e, #fad0c4, #fad0c4, #ffd1ff);
        }

        .glass-container {
            background: rgba(255, 255, 255, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 20px;
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .glass-shadow {
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        }
    </style>
</head>
<body class="font-sans antialiased bg-gradient-to-br from-pink-200 via-orange-100 to-yellow-50 text-gray-900 dark:text-gray-100">
<div class="min-h-screen flex flex-col">

    <nav class="glass-container border-b shadow-sm mx-4 my-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="text-lg font-bold text-gray-800 dark:text-white">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <div class="space-x-4 text-gray-800">
                    @guest
                        <a href="{{ route('login') }}" class="hover:underline">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="hover:underline">Register</a>
                        @endif
                    @else
                        <a href="{{ route('users.show', ['id' => Auth::id()]) }}" class="hover:underline">
                            {{ Auth::user()->name }}
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="hover:underline text-white ml-2">Log Out</button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow py-6">
        <div class="max-w-4xl mx-auto px-4">
            <div class="glass-container p-8 rounded-2xl text-gray-800 shadow-lg">
                @yield('content')
            </div>
        </div>
    </main>

    <footer class="text-center py-4 text-sm text-gray-700">
        &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
    </footer>
</div>

@stack('scripts')
</body>
</html>
