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
        nav, .content-glass, footer {
            -webkit-backdrop-filter: blur(12px);
            backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

<div class="min-h-screen flex flex-col pt-20 pb-12"> {{-- pt-20 = 80px, pb-12 = 48px --}}

    {{-- 固定头部 --}}
    <nav class="fixed top-0 inset-x-0 z-50 bg-white/30 dark:bg-gray-800/30 border-b border-gray-200 dark:border-gray-700 backdrop-blur">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <div class="hidden sm:flex space-x-4">
                    <a href="{{ route('home') }}"
                       class="px-1 pt-1 border-b-2 {{ request()->routeIs('home') ? 'border-indigo-400 text-gray-900 dark:text-gray-100' : 'border-transparent text-gray-500 dark:text-gray-400' }} hover:text-gray-700 dark:hover:text-gray-300 transition">
                        {{ __('Home') }}
                    </a>
                    <a href="{{ route('products.index') }}"
                       class="px-1 pt-1 border-b-2 {{ request()->routeIs('products.index') ? 'border-indigo-400 text-gray-900 dark:text-gray-100' : 'border-transparent text-gray-500 dark:text-gray-400' }} hover:text-gray-700 dark:hover:text-gray-300 transition">
                        {{ __('Products') }}
                    </a>
                    <a href="{{ route('categories.index') }}"
                       class="px-1 pt-1 border-b-2 {{ request()->routeIs('categories.index') ? 'border-indigo-400 text-gray-900 dark:text-gray-100' : 'border-transparent text-gray-500 dark:text-gray-400' }} hover:text-gray-700 dark:hover:text-gray-300 transition">
                        {{ __('Categories') }}
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex items-center space-x-4">
                @guest
                    <a href="{{ route('login') }}" class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                        {{ __('Login') }}
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                            {{ __('Register') }}
                        </a>
                    @endif
                @else
                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                @endguest
            </div>

            <div class="-mr-2 flex sm:hidden">
                <button class="p-2 text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 focus:outline-none">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    {{-- 主内容 --}}
    <main class="flex-grow bg-transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="content-glass bg-white/60 dark:bg-gray-800/30 rounded-lg overflow-hidden my-8">
                <div class="p-6">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

    {{-- 页脚 --}}
    <footer class="bg-white/50 dark:bg-gray-800/50 backdrop-blur border-t border-gray-200 dark:border-gray-700 mt-8">
        <div class="max-w-7xl mx-auto px-4 py-4 text-center text-sm text-gray-700 dark:text-gray-300">
            &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
        </div>
    </footer>

</div>

@stack('scripts')
</body>
</html>

