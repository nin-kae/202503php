<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')

    <style>
        body {
            font-family: 'Inter', system-ui, sans-serif;
            background: #f5f7fa;
            color: #1f2937;
        }

        .glass-container {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.06);
        }

        nav.glass-container {
            background-color: #ffffff;
            border-bottom: 1px solid #e5e7eb;
        }

        nav a, nav span, nav button {
            color: #374151;
            font-weight: 500;
        }

        nav a:hover {
            color: #1d4ed8;
        }

        .btn-logout {
            color: #1f2937;
            background: transparent;
            border: none;
            cursor: pointer;
            font-weight: 500;
        }

        .btn-logout:hover {
            color: #dc2626;
        }

        footer {
            background: #ffffff;
            border-top: 1px solid #e5e7eb;
        }
    </style>
</head>
<body class="antialiased">

<div class="min-h-screen flex flex-col">
    {{-- Header --}}
    <nav class="glass-container px-4 sm:px-6 lg:px-8 py-3 shadow-sm">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-semibold">
                {{ config('app.name', 'Laravel') }}
            </a>
            <div class="space-x-4">
                @guest
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @else
                    <a href="{{ route('users.show', ['id' => Auth::id()]) }}">
                        {{ Auth::user()->name }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="btn-logout">Log Out</button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    {{-- Content --}}
    <main class="flex-grow py-10">
        <div class="max-w-4xl mx-auto px-4">
            <div class="glass-container p-8">
                @yield('content')
            </div>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="text-center py-4 text-sm text-gray-500">
        &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
    </footer>
</div>

@stack('scripts')
</body>
</html>
