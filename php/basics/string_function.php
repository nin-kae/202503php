<?php

// string Funtion in PHP
// 1. strlen() — 获取字符串的长度
echo strlen("Hello World!"); // 输出：12
// $返回值 = 函数名();
// echo $返回值; // 输出：12    
echo "<br>";

echo "「你好」所占的字节数是：" . strlen("你好"); // 输出：6
echo "<br>";

mb_strlen("你好"); // 输出：2
echo "<br>";

// mb_strlen(string $string, ?string $encoding = null): int
// 获取字符串的长度，支持多字节字符集
// mb_strlen() 函数用于获取字符串的长度，支持多字节字符集（如 UTF-8）。
// $string 前面的 string 是参数类型声明，声明了参数 $string 的类型为 string。
// $string：要计算长度的字符串
// $encoding：可选参数，指定字符编码，默认值为 null
// 返回值：返回字符串的长度（以字符为单位）

// mb_strlen() - 获取字符串的长度
echo mb_strlen("你好"); // 输出：2
echo "<br>";
echo mb_strlen("こんにちは朝日"); // 输出：７
echo "<br>";

$string = "Hello World, hello PHP!";
$find = "hello";

$pose1 = strpos($string, $find); // 从头开始找，区分大小写，找不到“hello”返回 false
if ($pos1 === false) {
    echo "'$find' ont found (case-sensitive).\n";
} else {
    echo "'$find' found ai index: $pos1\n";
}
echo "<br>";

$findUpper = "Hello";
$pos2 = strpos($string, $findUpper); // 找到了 “Hello”
if ($pos2 !== false) {
    echo "'$findUpper' found at index: $pos2\n"; // 输出：‘Hello’ found at index: 0
}
echo "<br>";

// 错误用法示例
if (strpose($string, $findUpper) === false) { // 错误：$pos2 为 0 时，0 == false，
    echo "判断错误：'$findUpper' not found.\n";
}
echo "<br>";

// 从第七个字符开始找
$pos3 = strpos($string, $find, 7); // 从第七个字符开始找
if ($pos3 !== false) {
    echo "从索引 7 开始，'$find' found at index: $pos3\n"; // 输出：‘hello’ found at index: 13
}
echo "<br>";

$lastPos = strrpos($string, $find); // 从后往前找
if ($lastPos !== false) {
    echo "Last '$find' found at index(case-insensitive): $lastPos\n"; // 输出：‘hello’ found at index: 13
}
echo "<br>";

$email = "renhuaying0401@gmail.com";
$domain = substr($email, '@'); // 从 @ 后面开始截取
echo $domain . "<br>"; // 输出：gmail.com

$url = "https://www.example.com";
if (str_contains($url, "example")) {
    echo "URL contains 'example'.\n"; // 输出：URL contains 'example'.
}

if (str_starts_with($url, "https://")) {
    echo "URL uses HTTPS.<br>"; // 输出：URL starts with 'https'.
}

$filename = "document.pdf";
if (str_ends_with($filename, ".pdf")) {
    echo "File is a PDF.<br>"; // 输出：File is a PDF.
}