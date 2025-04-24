<?php

require_once './helpers.php';

header('Content-Type: text/html; charset=urf-8');

// printRWithBr($_GET);
printRWithBr($_POST);
echoHr();
printRWithBr($_REQUEST);
echoHr();
printRWithBr($_COOKIE);

// 如果你的 session 没有启动，访问 session 可能会报错
session_start();
printRWithBr($_SESSION);

//echoHr();
//printRWithBr($_SERVER);

echoHr();
printRWithBr($_FILES);

// 始终要记住用户输入的任何内容都是不可信的，一定要进行验证和过滤
// 去搜索了解一下什么是 CSRF 攻击，什么是 XSS 攻击，什么是 SQL 注入攻击，什么是文件上传漏洞
/* 1. CSRF 攻击
CSRF 全称是：Cross-Site Request Forgery ; 中文叫：跨站请求伪造
黑客“借用你的登录身份”，向你已登录的网站发请求。

例如：
你在浏览器中登录了银行网站（cookie 已经保存），你不小心打开了一个恶意网页，这个网页偷偷放了一个：
<img src="https://mybank.com/transfer?to=hack&amount=10000" />

这个 <img> 会自动发 GET 请求！
因为浏览器会自动带上你登录时的 cookie，银行认为这是你本人操作 → 💥 钱就转出去了！

*/

/* 2. XSS 攻击
XSS（Cross-Site Scripting）跨站脚本攻击
指攻击者在网页中注入恶意脚本代码（通常是 JavaScript），当其他用户访问时，这段脚本就会在他们的浏览器中执行。

攻击者提交了这个评论内容：<script>alert('你被XSS了');</script>
如果你不做处理，页面就会变成：<script>alert('你被XSS了');</script>

*/

/* 3. SQL 注入攻击
SQL 注入（SQL Injection）是一种黑客攻击方式，利用你程序中没有防范的输入，往 SQL 语句里“注入”恶意代码，从而 控制或破坏数据库。
例如：
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

如果黑客输入用户名：用户名：' OR '1'='1; 密码：（随便输）
生成的 SQL 变成 SELECT * FROM users WHERE username = '' OR '1'='1' AND password = '';

因为 '1'='1' 永远为真，这条语句会绕过密码验证，直接登录成功！
*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echoHr();
    echoWithBr('只有 POST 请求才会输出以下内容:');
    // 处理表单提交
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $age = $_POST['age'] ?? '';

    printRWithBr($_POST);

    // 可以添加更多的表单处理逻辑，比如验证和存储数据
    echo "Name: $name<br>";
    echo "Email: $email<br>";
    echo "Age: $age<br>";
}