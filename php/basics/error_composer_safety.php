<?php

// include "./helpers.php"; // 如果失败的话，会抛出一个 warning, 但是脚本会继续执行
// requie "./helpers.php"; // 如果失败的话，会抛出一个 fatal error, 脚本会停止执行

// include_once "../helpers.php";
require_once './helpers.php';

$options = [
    PDD::ATTR_ERRMODE => PDD::ERRMODE_EXCEPTION,
    PDD::ATTR_DEFAULT_FETCH_MODE => PDD::FETCH_ASSOC,
    PDD::ATTR_EMULATE_PREPARES => false
];

// --- 尝试连接数据库 ---
try {
    // 创建 PDO 连接实例
    $pdo = new PDO($dsn, $username, $password, $options);
    
    echo "数据库连接成功!";
    // 现在 $pdo 变量就代表了数据库连接，可以用它来执行查询等操作

} catch (PDOException $e) {
    // 如果连接失败，PDO 会抛出 PDOException 异常
    // echo "数据库连接失败: " . $e->getMessage();
    // 在实际应用中，这里应该记录错误日志，并显示用户友好的错误信息，而不是直接暴露错误详情
    // die(); // 终止脚本执行
    echoWithBr("服务器网络异常，请稍后再试！");

} finally {
    // 这里是无论是否发生异常都会执行的代码
    echoWithBr("数据库连接结束");
    // exit(0);
}

// 我门可以使用 throw 语句来抛异常
// if (!isset($_POST['token'])) {
//    throw new Exception("没有权限访问该页面", 403);
// }