<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 40px;
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
            color: #111827;
        }

        header {
            margin-bottom: 40px;
            text-align: center;
        }

        header h1 {
            font-size: 28px;
            font-weight: 600;
            color: #1f2937;
        }

        .profile-section {
            max-width: 700px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #e5e7eb;
            padding: 16px 0;
        }

        .label {
            font-weight: 600;
            color: #374151;
            width: 30%;
        }

        .value {
            color: #111827;
            text-align: right;
            width: 70%;
        }

        .back-link {
            display: inline-block;
            margin-top: 40px;
            font-size: 15px;
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<header>
    <h1>User Information</h1>
</header>

<section class="profile-section">
    <div class="info-row">
        <div class="label">Name</div>
        <div class="value">{{ $user->name }}</div>
    </div>

    <div class="info-row">
        <div class="label">Email</div>
        <div class="value">{{ $user->email }}</div>
    </div>

    <div class="info-row">
        <div class="label">Registered</div>
        <div class="value">{{ $user->created_at->format('Y-m-d H:i') }}</div>
    </div>

    <a href="{{ url('/') }}" class="back-link">← Back to Home</a>
</section>

</body>
</html>

