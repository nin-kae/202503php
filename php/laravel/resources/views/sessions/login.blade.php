{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center min-h-[calc(100vh-10rem)]">
        {{-- 整个登录框 --}}
        <div class="glass-container p-8 rounded-lg w-full max-w-md mx-4">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Login to Your Account</h2>

            {{-- 状态消息 --}}
            @if (session('status'))
                <div class="mb-4 px-4 py-2 bg-green-50 border border-green-200 text-green-800 rounded">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 px-4 py-2 bg-red-50 border border-red-200 text-red-800 rounded">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                        Email Address <span class="text-red-500">*</span>
                    </label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        class="block w-full bg-white border border-gray-300 rounded-md px-3 py-2
                           text-gray-800 placeholder-gray-400 focus:outline-none
                           focus:ring-2 focus:ring-slate-400 focus:border-transparent"
                        placeholder="you@example.com"
                    >
                    @error('email')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                        Password <span class="text-red-500">*</span>
                    </label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        class="block w-full bg-white border border-gray-300 rounded-md px-3 py-2
                           text-gray-800 placeholder-gray-400 focus:outline-none
                           focus:ring-2 focus:ring-slate-400 focus:border-transparent"
                        placeholder="••••••••"
                    >
                    @error('password')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember --}}
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox"
                           class="h-4 w-4 text-slate-600 border-gray-300 rounded focus:ring-slate-400">
                    <label for="remember" class="ml-2 block text-sm text-gray-700">
                        Remember me
                    </label>
                </div>

                {{-- Submit --}}
                <div>
                    <button
                        type="submit"
                        class="w-full py-2 rounded-md bg-slate-600 text-white font-medium
                           hover:bg-slate-700 transition-colors"
                    >
                        Log In
                    </button>
                </div>
            </form>

            {{-- 注册 链接 --}}
            <p class="mt-6 text-center text-sm text-gray-600">
                Don’t have an account?
                <a href="{{ route('register') }}" class="text-slate-600 font-medium hover:underline">
                    Sign up here
                </a>
            </p>
        </div>
    </div>
@endsection
