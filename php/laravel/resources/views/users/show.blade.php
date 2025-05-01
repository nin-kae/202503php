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
            background: linear-gradient(135deg, #74ebd5, #acb6e5);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .container {
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 30px;
            padding: 40px;
            width: 90%;
            max-width: 500px;
            color: #ffffff;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        h1 {
            margin-bottom: 20px;
            font-size: 28px;
            font-weight: 600;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
        }

        .info {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-top: 30px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
        }

        .label {
            font-size: 25px;
            font-weight: 600;
            color: #e0e0e0;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .value {
            font-size: 20px;
            font-weight: 500;
            color: #ffffff;
            text-shadow: 0 1px 3px rgba(0,0,0,0.3);
        }

        a.button {
            margin-top: 30px;
            display: inline-block;
            padding: 12px 30px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            text-decoration: none;
            border: 1px solid #fff;
            border-radius: 30px;
            transition: all 0.3s ease;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        }

        a.button:hover {
            background-color: rgba(255, 255, 255, 0.4);
            color: #333;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>User Information</h1>

    <div class="info">
        <div class="info-row">
            <span class="label">Name:</span>
            <span class="value">{{ $user->name }}</span>
        </div>
        <div class="info-row">
            <span class="label">Email:</span>
            <span class="value">{{ $user->email }}</span>
        </div>
        <div class="info-row">
            <span class="label">Registered:</span>
            <span class="value">{{ $user->created_at->format('Y-m-d H:i') }}</span>
        </div>
    </div>

    <a href="/" class="button">Back to Home</a>
</div>
</body>
</html>


