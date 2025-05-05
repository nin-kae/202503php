{{-- 文件路径: resources/views/auth/register.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center min-h-[calc(100vh-10rem)]">
        {{-- 整个注册框 --}}
        <div class="glass-container p-8 rounded-lg w-full max-w-lg mx-4">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Create Your Account</h2>

            {{-- 验证错误 --}}
            @if ($errors->any())
                <div class="mb-4 px-4 py-2 bg-red-50 border border-red-200 text-red-800 rounded">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.store') }}" class="space-y-5">
                @csrf

                {{-- Full Name --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                        Full Name <span class="text-red-500">*</span>
                    </label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        class="block w-full bg-white border border-gray-300 rounded-md px-3 py-2
                           text-gray-800 placeholder-gray-400 focus:outline-none
                           focus:ring-2 focus:ring-slate-400 focus:border-transparent"
                        placeholder="Enter your full name"
                    >
                    @error('name')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email Address --}}
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
                        placeholder="Choose a strong password"
                    >
                    @error('password')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">Minimum 8 characters recommended.</p>
                </div>

                {{-- Confirm Password --}}
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                        Confirm Password <span class="text-red-500">*</span>
                    </label>
                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        required
                        class="block w-full bg-white border border-gray-300 rounded-md px-3 py-2
                           text-gray-800 placeholder-gray-400 focus:outline-none
                           focus:ring-2 focus:ring-slate-400 focus:border-transparent"
                        placeholder="Enter the password again"
                    >
                    @error('password_confirmation')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit Button --}}
                <div>
                    <button
                        type="submit"
                        class="w-full py-2 rounded-md bg-slate-600 text-white font-medium
                           hover:bg-slate-700 transition-colors"
                    >
                        Register
                    </button>
                </div>
            </form>

            {{-- 已有账号 链接 --}}
            <p class="mt-6 text-center text-sm text-gray-600">
                Already have an account?
                <a href="{{ route('login') }}" class="text-slate-600 font-medium hover:underline">
                    Log in here
                </a>
            </p>
        </div>
    </div>
@endsection

