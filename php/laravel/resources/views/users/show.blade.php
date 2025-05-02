<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>用户详情</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f6d365, #fda085);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .container {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 24px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            padding: 40px;
            max-width: 480px;
            width: 90%;
            color: #ffffff;
            text-align: center;
        }

        h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 30px;
            text-shadow: 0 1px 3px rgba(0,0,0,0.3);
        }

        .info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px 10px;
            text-align: left;
            text-shadow: 0 1px 3px rgba(0,0,0,0.3);
        }

        .label {
            font-size: 18px;
            font-weight: 600;
            color: #f0f0f0;
            text-shadow: 0 1px 2px rgba(0,0,0,0.2);
            text-shadow: 0 1px 3px rgba(0,0,0,0.3);
        }

        .value {
            font-size: 18px;
            font-weight: 500;
            color: #ffffff;
            text-shadow: 0 1px 3px rgba(0,0,0,0.25);
            text-align: right;
        }

        .button {
            margin-top: 30px;
            display: inline-block;
            padding: 12px 30px;
            background-color: rgba(255, 255, 255, 0.25);
            border: 1px solid #ffffff;
            border-radius: 50px;
            text-decoration: none;
            color: #fff;
            font-weight: 600;
            transition: all 0.3s ease;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.25);
        }

        .button:hover {
            background-color: rgba(255, 255, 255, 0.4);
            color: #333;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>User Information</h1>

    <div class="info">
        <div class="label">Name: </div>
        <div class="value">{{ $user->name }}</div>

        <div class="label">Email: </div>
        <div class="value">{{ $user->email }}</div>

        <div class="label">Registered: </div>
        <div class="value">{{ $user->created_at->format('Y-m-d H:i') }}</div>
    </div>

    <a href="/" class="button">Back to Home</a>
</div>
</body>
</html>
