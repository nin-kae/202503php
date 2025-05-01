<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>404 - 页面未找到</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts - Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8d800, #f87f24, #e83f6f, #6a0572);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            color: #fff;
            overflow: hidden;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .container {
            text-align: center;
            padding: 10vh 2rem;
            animation: fadeIn 1.2s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .code {
            font-size: 8rem;
            font-weight: 700;
            margin: 0;
            animation: wobble 2.5s infinite ease-in-out;
        }

        @keyframes wobble {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(1deg); }
            75% { transform: rotate(-1deg); }
        }

        .message {
            font-size: 2rem;
            margin: 1rem 0 0.5rem;
        }

        .subtext {
            font-size: 1.1rem;
            color: #fdfdfd;
            margin-bottom: 2rem;
        }

        .btn-home {
            display: inline-block;
            padding: 0.8rem 2rem;
            font-size: 1rem;
            background: #ffffff;
            color: #e83f6f;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .btn-home:hover {
            background: #e83f6f;
            color: #fff;
        }

        .cat-image {
            width: 180px;
            margin-top: 30px;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="code">404</h1>
    <p class="message">Oh! The page is lost.</p>
    <p class="subtext">The page you're looking for might not exist or has been removed.</p>
    <a href="{{ url('/') }}" class="btn-home">Go Home</a>
    <br>
</div>
</body>
</html>







