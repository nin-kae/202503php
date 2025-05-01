<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>欢迎加入</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 40px 0;
        }

        .email-container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #2c3e50;
        }

        p {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
        }

        .button {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 24px;
            background-color: #3490dc;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #aaa;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="email-container">
    <h1>欢迎你，{{ $user->name }}！🎉</h1>
    <p>
        感谢你注册我们的网站，我们很高兴你能加入我们！
        接下来你可以开始使用我们的服务啦。
    </p>

    <a href="{{ url('/dashboard') }}" class="button">进入我的主页</a>

    <div class="footer">
        此邮件为系统自动发送，请勿直接回复。
    </div>
</div>
</body>
</html>
