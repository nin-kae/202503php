<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Info</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 60px 20px;
            background-color: #f7f7f8;
            font-family: 'Inter', sans-serif;
            color: #1f2937;
        }

        .wrapper {
            max-width: 720px;
            margin: 0 auto;
        }

        h1 {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 40px;
            color: #111827;
            letter-spacing: -0.5px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 16px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .label {
            color: #6b7280;
            font-weight: 500;
        }

        .value {
            font-weight: 500;
            color: #374151;
        }

        .back-button {
            display: inline-block;
            margin-top: 40px;
            padding: 10px 24px;
            background-color: #6b7280; /* slate-500 */
            color: white;
            font-weight: 500;
            text-decoration: none;
            border-radius: 6px;
            transition: background 0.3s ease;
        }

        .back-button:hover {
            background-color: #4b5563; /* slate-600 */
        }

    </style>
</head>
<body>
<div class="wrapper">
    <h1>User Information</h1>

    <div class="info-row">
        <span class="label">Name</span>
        <span class="value">{{ $user->name }}</span>
    </div>
    <div class="info-row">
        <span class="label">Email</span>
        <span class="value">{{ $user->email }}</span>
    </div>
    <div class="info-row">
        <span class="label">Registered</span>
        <span class="value">{{ $user->created_at->format('Y-m-d H:i') }}</span>
    </div>

    <a href="/" class="back-button">← Back to Home</a>
</div>
</body>
</html>
