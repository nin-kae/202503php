<?php

function sayHello(): void
{
    echo "你好，欢迎来到编程世界";
}

function helloUSer($name): void
{
    echo "你好，" . $name . "! <br>";
}

function addNumber(int $num1, int $num2): int
{
    $num1 = 1;
    return $num1 + $num2;
}

sayHello();
helloUser("张三");
$num1 = 5;
$sum = addNumber($num1, 10);
echo $sum . "<br>";
echo "这是变量 num1 的值： " . $num1 . "<br>";

// $a 的内存地址是 0x7f8c4c0b2a40
// $b 的内存地址是 0x7f8c4c0b2a40
// ¥c 的内存地址是 0x7f8c4c0b2a40

$a = 5;
$b = &$a; // 引用赋值
$b = 20; // 修改 $b 的值
$c = 30; // $c 是一个新的变量
echo "这是变量 a 的值： " . $a . "<br>"; // 输出：20
echo "这是变量 b 的值： " . $b . "<br>"; // 输出：20
echo "这是变量 a 的地址： " . var_dump($a) . "<br>"; // 输出：20
echo "这是变量 b 的地址： " . var_dump($b) . "<br>"; // 输出：20

// 按照城市和日期获取天气信息
// 
// @param string $city 城市
// @param string $date 日期
// @return array|null 返回天气信息数组或 null

function getWeather(string $city,string $date = '2025-04-15'): ?array
{
    $weather = [
        '北京' => ['2025-04-15' => '晴', '2025-04-16' => '阴', '2025-04-17' => '雨'],
        '上海' => ['2025-04-15' => '阴', '2025-04-16' => '雨', '2025-04-17' => '晴'],
        '广州' => ['2025-04-15' => '雨', '2025-04-16' => '晴', '2025-04-17' => '阴']
    ];

    $result = [];
    if (isset($weather[$city][$date])) {
        $result['city'] = $city;
        $result['date'] = $date;
        $result['weather'] = $weather[$city][$date];
        return $result;
    } else {
        return null;
    }
};

$weather = getWeather('北京', '2025-04-15');
echo $weather['date'] . '' . $weather['city'] . "的天气是：" . $weather['weather'] . "<br>"; 

/**
 *  计算多个数的和
 *  可变参数函数，$numbers 是一个包含所有传入参数的数组
 * 
 *  @param int ...$numbers 
 *  @return int 返回所有参数的和
 */

function sumNumbers(int ...$numbers): int
{
    $sum = 0;
    foreach ($numbers as $number) {
        $sum += $number; // $sum += $number; 是 $sum = $sum + $number;
    }
    return $sum;
}

$sum = sumNumbers(1, 2, 3);
echo "1 + 2 + 3 = " . $sum . "<br>"; // 输出：1 + 2 + 3 = 6

/**
 *  演示命名参数
 * 
 * @param string $username
 * @param string $email
 * @param bool $isActive
 * @param bool $isAdmin
 * @return void
 */

function createUser(string $username, string $email, bool $isActive = true, bool $isAdmin = false): void
{
    echo "创建用户：<br>";
    echo "  用户名: " . $username . "<br>";
    echo "  邮箱: " . $email . "<br>";
    echo "  激活状态: " . ($isActive ? '是' : '否') . "<br>";
    echo "  管理员: " . ($isAdmin ? '是' : '否') . "<br>";
}

$name = "ninkae";
createUser(username: $name, email: 'renhuaying0401@gmail.com', isAdmin: 1);


// 用 retrun 返回多个值。一旦执行到 return 语句，函数就会立即停止执行，并返回指定的值
function getUserInfo($id) {
    $name = "张三";
    $age = 25;
    return [
        'name' => $name,
        'age' => $age
    ]; // 返回一个包含多个信息的数组
}

$userInfo = getUserInfo(1);
echo "用户名：" . $userInfo['name'] . "，年龄：" . $userInfo['age'] . "<br>";

// 默认参数值

function showMessage($message, $name = "游客") {
    echo $name . "说：" . $message . "\n";
}

showMessage("终于到啦！"); // 使用默认参数值
showMessage("欢迎来到游乐园！", "导游"); // 使用自定义参数值

// 按值传递 （保护数据）
function incrementValue($number) {
    $number++; // 修改的是函数内部的副本 $number
    echo "函数内部的值：" . $number . "\n";
}

$value = 5;
incrementValue($value); // 传递的是 $value 的副本，然后复制给 $number
echo "函数外部的值：" . $value . "\n"; // $value 输出为5

/**
 * 函数内部的值：6
 * 函数外部的值：5
 */

// 引用传递 & （直接更新用户设置，重置状态，追加数据）
function incrementReference(&$number) {
    $number++; // 修改的是函数内部的引用 $number
    echo "函数内部的值：" . $number . "\n";
}

$value = 10;
incrementReference($value); // 将 $value 的引用传递给 $number
echo "函数外部的值：" . $value . "\n"; // $value 输出为11

/**
 * 函数内部的值：11
 * 函数外部的值：11
 */