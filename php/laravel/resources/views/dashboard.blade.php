<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap"
        rel="stylesheet">
    <style>
        /* 全局基础重置 */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html, body {
            height: 100%;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f0f2f5;       /* 极淡的灰白背景 */
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            width: 95%;
            max-width: 420px;
            padding: 2.5rem;
            background: #ffffff;
            border-radius: 16px;        /* 圆角 */
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            text-align: center;
            animation: fadeIn 0.6s ease-out;
        }

        h1 {
            font-size: 2.25rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: #1f2937;
        }

        p {
            font-size: 1rem;
            color: #555;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        a.button {
            display: inline-block;
            padding: 0.75rem 2rem;
            background-color: #4f46e5;  /* 宁静的靛蓝色 */
            color: #fff;
            font-weight: 600;
            font-size: 0.95rem;
            border-radius: 9999px;      /* pill 样式 */
            text-decoration: none;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }
        a.button:hover {
            background-color: #4338ca;
            transform: translateY(-2px);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 480px) {
            .card {
                padding: 2rem 1.5rem;
            }
            h1 {
                font-size: 1.75rem;
            }
        }
    </style>
</head>
<body>

<div class="card">
    <h1>Welcome Back!</h1>
    <p>You have successfully logged in.<br>Start your Laravel journey now!</p>
    <a href="{{ url('/') }}" class="button">Back to Home</a>
</div>

</body>
</html>
