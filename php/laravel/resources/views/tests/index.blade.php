<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff;
        }

        .welcome-container {
            text-align: center;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            font-size: 1rem;
            color: #fff;
            background-color: #ff6f61;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #ff3b2f;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Welcome to Our Website!</h1>
        <p>We are glad to have you here. Explore and enjoy your stay!</p >
        <a href=" " class="btn">Get Started</a >
    </div>
</body>
</html>

@extends('layouts.app')
@section('title', 'Test Page')

@section('content')
    <div class="container">
        <div class="mb-4">
            <h1 class="text-3xl mb-2">Test Page</h1>
            <p>This is a test page.</p>
            <p>Current date and time: {{ now() }}</p>
        </div>
        @if(!empty($data))
            <div class="item mb-4">
                <p>{{ $data['name'] }}</p>
                <p>{{ $data['version'] }}</p>
                <p>{{ $data['author'] }}</p>
            </div>
        @endif
        <p class="mb-4">此网站的作者是: {{ $author }}</p>

        @if(!$categories->isEmpty())
            @foreach($categories as $category)
                <div class="category mb-4">
                    <h2 class="text-2xl mb-2 border-b border-gray-900">
                        <i class="me-3">#{{ $category->id }} </i>{{ $category->name }}
                    </h2>
                </div>
            @endforeach
            {{ $categories->links() }}
        @endif

        <hr class="mt-5">

        <div class="mb-4">
            {!! $html !!}
            {{ $html }}
        </div>

        <div class="mb-4">

        </div>
@endsection
