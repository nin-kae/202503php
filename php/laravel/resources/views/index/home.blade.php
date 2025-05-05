{{-- resources/views/index/home.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center py-20">
        <div class="p-8 rounded-lg w-full max-w-3xl mx-4">

            {{-- 标题 --}}
            <h1 class="fade-in text-4xl font-extrabold text-gray-900 dark:text-white mb-4">
                Welcome to {{ config('app.name', 'Your Application') }}!
            </h1>

            {{-- 副标题 --}}
            <p class="fade-in text-lg text-gray-600 dark:text-gray-400 mb-8">
                This is the home page of your awesome Laravel 12 application styled with Tailwind CSS.
            </p>

            {{-- 根据认证状态显示不同内容 --}}
            @auth
                <div class="fade-in bg-green-100 dark:bg-green-900 border-l-4 border-green-500 text-green-700 dark:text-green-300 p-4 mb-6 inline-block text-left rounded">
                    <p class="font-bold">Hello, {{ Auth::user()->name }}!</p>
                    <p>You are successfully logged in.</p>
                    <p class="mt-2">
                        You can view your <a href="{{ route('users.show', Auth::id()) }}"
                                             class="font-medium text-green-800 dark:text-green-200 hover:underline">profile here</a>.
                    </p>
                </div>
            @else
                <div class="fade-in bg-blue-100 dark:bg-blue-900 border-l-4 border-blue-500 text-blue-700 dark:text-blue-300 p-4 mb-6 inline-block text-left rounded">
                    <p>Looks like you're visiting as a guest.</p>
                    <p class="mt-2">
                        <a href="{{ route('login') }}" class="font-medium text-blue-800 dark:text-blue-200 hover:underline">Login</a>
                        or
                        <a href="{{ route('register') }}"
                           class="font-medium text-blue-800 dark:text-blue-200 hover:underline">Register</a>
                        to access more features!
                    </p>
                </div>
            @endauth

            {{-- 功能列表 --}}
            <div class="fade-in mt-10 text-left max-w-2xl mx-auto">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-3">What you can do:</h2>
                <ul class="list-disc list-inside text-gray-600 dark:text-gray-400 space-y-2">
                    <li>Browse the site content.</li>
                    <li>Register for a new user account.</li>
                    <li>Login with your existing credentials.</li>
                    <li>View user profiles (requires login for specific details).</li>
                    <li>Logout when you are finished.</li>
                </ul>
            </div>

            {{-- 行动按钮 --}}
            <div class="fade-in mt-10 text-center">
                <a href="{{ route('register') }}"
                   class="welcome-btn inline-flex items-center px-6 py-3 border border-transparent rounded-md font-semibold text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition ease-in-out duration-150">
                    Get Started
                </a>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* 淡入动画基础样式 */
        .fade-in {
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .fade-in.show {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
@endpush

@push('scripts')
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            // 依次给所有 .fade-in 元素添加 .show，实现错落淡入效果
            document.querySelectorAll('.fade-in').forEach((el, idx) => {
                setTimeout(() => {
                    el.classList.add('show');
                }, idx * 200);
            });

            // 简单的按钮点击反馈
            const btn = document.querySelector('.welcome-btn');
            btn.addEventListener('click', () => {
                btn.textContent = '🚀 Let’s go!';
                setTimeout(() => {
                    btn.textContent = 'Get Started';
                }, 1000);
            });
        });
    </script>
@endpush

{{-- 如果需要为此页面添加特定的 CSS 或 JS --}}
{{-- @push('styles')
<style>
    /* Home page specific styles */
</style>
@endpush --}}

{{-- @push('scripts')
<script>
    console.log('Home page JavaScript loaded!');
</script>
@endpush --}}
