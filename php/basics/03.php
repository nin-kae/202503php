<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p>
    <?php
        $is_admin = true; // 假设这是从数据库中获取的值
        $is_logged_in = true; // 假设这是从会话中获取的值
        $username = "张三"; // 假设这是从数据库获取的值
    ?>

    <?php if ($is_admin): ?>
        <span>欢迎管理员</span>
        <a href="admin.php">进入管理后台</a>
    <?php elseif ($is_logged_in): ?>
        <?php echo htmlspecialchars($username); ?>!
    <?php else: ?>
            请 <a href="\login">登录</a> 或 <a href="\register">注册</a>
    <?php endif; ?>
</p>   
</body>
</html>