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

// 查找与搜索子字符串
$string = "Hello World, hello PHP!";
$find = "hello"; // 查找子字符串

$pos1 = strpos($string, $find); // 查找子字符串在大字符串中第一次出现的位置的函数
if ($pos1 === false) { 
    echo "'$find' ont found (case-sensitive).\n"; // case-sensitive 是区分大小写的术语
} else {
    echo "'$find' found at index: $pos1\n"; // 输出：‘hello’ found at index: 13
}
echo "<br>";

$findUpper = "Hello"; // 自定义函数 Upper 是大写的意思
$pos2 = strpos($string, $findUpper); // 找到了 “Hello”
if ($pos2 !== false) { // !== 值不相等 或者 类型不一样
    echo "'$findUpper' found at index: $pos2\n"; // 输出：‘Hello’ found at index: 0
}
echo "<br>";

// stripos 的使用，与 strpos 的功能一样，但不区分大小写
$pos3 = stripos($string, $find);
if ($pos3 !== false) {
    echo "'$find' " . "found at index (case-insensitive): $pos3\n"; // 输出：'hello' found at index (case-insensitive): 0
}
echo "<br>";

// 查找子字符串 最后一次 出现的位置 使用 strrpos 与 strripos
$string1 = "Hello World, hello PHP, Hello tokyo, hello Japan";
$find1 = "hello"; // 查找子字符串

// strrpos 区分大小写
$findUpper1 = "Hello";
$lastPos = strrpos($string1, $findUpper1); // 找最后一个 "Hello",(区分大小写)
if ($lastPos !== false) {
    echo "Last '$findUpper' found at index: $lastPos\n"; // 输出: Last 'hello' found at index (case-insensitive): 24
}
echo "<br>";

// strripos 不区分大小写
$lastPos = strripos($string1, $find1); // 找最后一个 "hello",(区分大小写)
if ($lastPos !== false) {
    echo "Last '$find' found at index (case-insensitive): $lastPos\n"; // 输出: Last 'hello' found at index (case-insensitive): 37
}
echo "<br>";

// 错误用法示例
// if (strpose($string, $findUpper) === false) { // 错误：$pos2 为 0 时，0 == false，
//     echo "判断错误：'$findUpper' not found.\n";
// }
// echo "<br>";

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
$domain = strstr($email, '@'); // 从 @ 后面开始截取
echo $domain . "<br>"; // 输出：gmail.com

$user = strstr($email, '@', true); // 第三个参数为 true
echo $user . "<br>"; // 输出：renhuaying0401

$url = "https://www.example.com";
if (str_contains($url, "example")) {
    echo "URL contains 'example'.\n"; // 输出：URL contains 'example'.
}

if (str_starts_with($url, "https://")) {
    echo "URL uses HTTPS.\n"; // 输出：URL starts with 'https'.
}

$filename = "document.pdf";
if (str_ends_with($filename, ".pdf")) {
    echo "File is a PDF.\n"; // 输出：File is a PDF.
}