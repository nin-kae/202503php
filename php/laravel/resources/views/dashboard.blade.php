<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #ffecd2, #fcb69f);
            font-family: 'Poppins', sans-serif;
            color: #222;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .card {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #222;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 460px;
            width: 90%;
            animation: fadeIn 0.8s ease-in-out;
        }

        h1 {
            font-size: 32px;
            margin-bottom: 18px;
            font-weight: 600;
            color: #222;
            text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.5);
        }

        p {
            font-size: 17px;
            color: #444;
            margin-bottom: 30px;
        }

        a.button {
            display: inline-block;
            padding: 12px 28px;
            background-color: rgba(255, 255, 255, 0.6);
            color: #333;
            border: 1px solid #ddd;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        a.button:hover {
            background-color: #fff;
            color: #f5576c;
            border-color: #f5576c;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="card">
    <h1>Welcome Back !</h1>
    <p>You have successfully logged in.<br>Start your Laravel journey now !</p>
    <a href="{{ url('/') }}" class="button">Back to Home</a>
</div>

</body>
</html>


