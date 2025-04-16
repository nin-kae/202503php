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
// $c 的内存地址是 0x7f8c4c0b2a90

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

function getWeather(string $city, string $date = '2025-04-15'): ?array
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

/**
 * 函数内部的值：11
 * 函数外部的值：11
 */

// 变量作用域
// 局部作用域：在函数内部定义的变量，只能在函数内部访问
// 全局作用域：在函数外部定义的变量，可以在函数内部访问，但需要使用 global 关键字

// $userAge = 30; // 全局变量
// function getUserinfo($userAge): void
// {
//     // echo $userAge; // 这里会报错，因为 $userAge 在函数内部是未定义的
//     // global $userAge; // 声明 $userAge 为全局变量,可以这么做但是不推荐，如果想访问全局变量，可以直接传递参数
//     echo $GLOBAL['userAge']; // 直接访问全局变量，$GLOBALS 是一个 PHP 内置的全局数组，用于访问全局作用域中的变量
//     echo $userAge;
//     $usename = "张三";
// };

// getUserinfo($userAge); // 调用函数，传递参数
// echo $usename; // 这里会报错，因为 $usename 在函数外部是未定义的

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

// 静态变量
function staticVariableExample(): void
{
    // static $count = 0; // 静态变量，在函数调用之间保持值
    $count = 0; // 普通变量，每次调用函数时都会重新初始化
    $count++;
    echo "函数调用次数：" . $count . "次。<br>";
}
staticVariableExample(); // 输出：函数调用次数：1
staticVariableExample(); // 输出：函数调用次数：1
staticVariableExample(); // 输出：函数调用次数：1

// 可变函数
function helloWorld(): void
{
    echo "Hello, World!<br>";
}

$helloWoeld = 'helloWorld'; // 函数名作为字符串
$helloWoeld(); // 调用函数 输出：Hello, World!

// 匿名函数
$greet = function($name) {
    echo "你好，" . $name . "!<br>";
};
$greet("小明"); // 调用匿名函数 输出：你好，小明!

// 使用 use 捕获外部变量
$messahegePrefix = "重要消息：";
$sendMessage = function($text) use ($messahegePrefix) { // 按值不活 $messahegePrefix
    echo $messahegePrefix . $text . "<br>";
    // $messagePrefix = "改不了"; 错误，因为是按值捕获的副本
};
// echo $messagePrefix . "<br>"; // 错误：重要消息：
$sendMessage("会议推迟了"); // 输出：重要消息：会议推迟了

$count = 0;
$increment = function() use (&$count) { // 按引用捕获 $count
    $count++;
};
$increment(); // 调用匿名函数
$increment(); 
echo "调用次数：" . $count . "<br>"; // 输出：调用次数：2

// 作为回调函数传递给 array_map 
$numbers = [1, 2, 3, 4];
$squareds = array_map(function($iem) {
    return $iem * $iem;
}, $numbers);
print_r($squareds); // 输出：Array ( [0] => 1 [1] => 4 [2] => 9 [3] => 16 )
echo "<br>";

// 箭头函数
$numbers = [1, 2, 3, 4];
$factor = 2; //父作用域变量

// 箭头函数自动捕获 $factor
$squareds = array_map(fn($iem) => $iem * $factor, $numbers);

print_r($squareds); // 输出：Array ( [0] => 2 [1] => 4 [2] => 6 [3] => 8 )
echo "<br>";

// 递归函数
#todo



