@extends('layouts.app')

@section('title', __('Posts'))

@section('content')
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ __('Posts') }}</h1>
        <div class="w-full sm:w-auto flex flex-col sm:flex-row gap-2">
            <form action="{{ route('posts.index') }}" method="GET" class="flex-grow sm:flex-grow-0">
                <div class="relative">
                    {{-- 搜索输入框，左侧不用留 padding 了，右侧给两边留出位置 --}}
                    <input
                        type="search"
                        id="search"
                        name="search"
                        placeholder="{{ __('Search posts...') }}"
                        value="{{ request('search') }}"
                        autocomplete="off"
                        class="block w-full pl-3 pr-12 py-2 border border-gray-300 rounded-md text-gray-900 placeholder-gray-500
             focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500
             sm:text-sm"/>

                    {{-- 清除按钮 X --}}
                    <button
                        type="button"
                        onclick="document.getElementById('search').value='';"
                        aria-label="Clear search"
                        class="absolute inset-y-0 right-10 flex items-center px-2
             text-gray-400 hover:text-gray-600 focus:outline-none">
                        {{-- 这里直接内联一个灰色 X svg --}}
                        <svg class="h-5 w-5 $gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 18L18 6M6 6l12 12" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    {{-- 提交按钮（右侧放大镜） --}}
                    <button
                        type="submit"
                        aria-label="Search"
                        class="absolute inset-y-0 right-2 flex items-center px-2
             text-gray-400 hover:text-gray-800 focus:outline-none"
                    >
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                </div>
            </form>

            <a href="{{ route('posts.create') }}"
               class="w-full sm:w-auto px-4 py-2 text-sm font-medium text-white text-center bg-indigo-600 hover:bg-indigo-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Create New Post') }}
            </a>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-sm overflow-x-auto sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('Title') }}
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('Author') }}
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('Status') }}
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('Published Date') }}
                </th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">{{ __('Actions') }}</span>
                </th>
            </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
            @forelse ($posts as $post)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                        <a href="{{ route('posts.show', $post) }}" class="hover:text-indigo-600 dark:hover:text-indigo-400">
                            {{ $post->title }}
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                        @if($post->author)
                            <a href="{{ route('authors.show', $post->author) }}" class="hover:text-indigo-600 dark:hover:text-indigo-400">
                                {{ $post->author->name }}
                            </a>
                        @else
                            {{ __('N/A') }}
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                        @if($post->status === 0) <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-100">{{ __('Draft') }}</span> @endif
                        @if($post->status === 1) <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-100">{{ __('Published') }}</span> @endif
                        @if($post->status === 2) <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800 dark:bg-gray-600 dark:text-gray-100">{{ __('Hidden') }}</span> @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                        {{ $post->created_at->translatedFormat('M d, Y') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                        <a href="{{ route('posts.show', $post) }}"
                           class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-200">{{ __('View') }}</a>
                        <a href="{{ route('posts.edit', $post) }}"
                           class="text-yellow-600 hover:text-yellow-900 dark:text-yellow-400 dark:hover:text-yellow-200">{{ __('Edit') }}</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('Are you sure you want to delete this post?') }}');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-200">{{ __('Delete') }}</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 text-center">
                        {{ __('No posts found.') }}
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    @if ($posts->hasPages())
        <div class="mt-6">
            {{ $posts->appends(request()->query())->links() }} {{-- appends search query to pagination links --}}
        </div>
    @endif
@endsection
