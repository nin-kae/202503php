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
        /* ---- 全局重置 & 变量 ---- */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #f0f2f5;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 1rem;
        }
        /* ---- 卡片 ---- */
        .card {
            width: 100%;
            max-width: 720px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            overflow: hidden;
            animation: fadeIn 0.5s ease-out;
        }
        /* ---- 卡片头部 ---- */
        .card-header {
            background: #4f46e5;
            color: #fff;
            padding: 1.5rem;
        }
        .card-header h1 {
            font-size: 1.75rem;
            font-weight: 600;
        }
        .card-header p {
            margin-top: 0.5rem;
            font-size: 1rem;
            opacity: 0.85;
        }
        /* ---- 表格容器 ---- */
        .table-wrap {
            max-height: 360px;
            overflow-y: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        thead {
            background: #f9fafb;
        }
        th, td {
            padding: 0.75rem 1rem;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }
        th {
            font-size: 0.9rem;
            font-weight: 600;
            color: #374151;
        }
        tbody tr:nth-child(even) {
            background: #f9fafb;
        }
        /* ---- 操作按钮 ---- */
        .card-footer {
            padding: 1rem 1.5rem;
            text-align: right;
            background: #fafafa;
        }
        .card-footer a.button {
            display: inline-block;
            padding: 0.6rem 1.4rem;
            background: #4f46e5;
            color: #fff;
            font-weight: 600;
            font-size: 0.9rem;
            border-radius: 9999px;
            text-decoration: none;
            transition: background-color .2s, transform .2s;
        }
        .card-footer a.button:hover {
            background: #4338ca;
            transform: translateY(-1px);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @media (max-width: 600px) {
            .card { max-width: 100%; }
            th, td { padding: 0.6rem 0.8rem; }
        }
    </style>
</head>
<body>

<div class="card">
    <div class="card-header">
        <h1>Welcome back!</h1>
        <p>共找到 {{ $users->count() }} 位激活用户</p>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>姓名</th>
                <th>邮箱</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>#{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        <a href="{{ url('/') }}" class="button">返回首页</a>
    </div>
</div>

</body>
</html>
