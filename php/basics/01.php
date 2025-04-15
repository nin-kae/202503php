<?php

echo "Hello, World!";
echo "<br>";
echo "Hello World!";
$a = "Hello World!";
echo "<br>";
// echo "这是字符串 + 变量是¥a";

// 函数名和变量名推荐使用小驼峰命名
$userName = "小明";
function getUserInfo() 
{

}

// 类名推荐使用大驼峰命名
class USerInfo
{

}

// PHP 变量
$city = "东京";
$age = 18;
$year = 10;
echo "<br>";
echo "我{$age}岁的时候来了日本，现在在{$city}生活了{$year}年";
// 在字符串中输出特殊符号的时候需要加上转义符号\\,比如说\$a，这样就可以输出变量{$a}的值了

//PHP 中的数据类型
echo "<br>";
$username = "小明";
$username1 = "ren";
$usernamr2 = "任";
$age = 26; //整数，int，正整数，负整数，零
$height = 1.75; // 浮点数，float
$weight = 70.5; // 浮点数，float
$isStudent = true; // 布尔值，bool
$isStudent1 = false; // 布尔值，bool
$hobbies = array("读书", "旅行", "运动"); // 数组，array
$hobbies1 = ["读书", "旅行", "运动"]; // 数组，array
$userOrder = null; //空值，null
//unset(¥isStudent); // 删除变量，unset() 函数可以删除变量，删除后变量值为null
var_dump($username); // 打印变量类型和内容，var_dump 是一个 PHP 内置函数，用于输出变量的类型和内容，在调试时非常有用
echo "<br>";
var_dump($username1);
echo "<br>";
var_dump($usernamr2);
echo "<br>";
var_dump($age);
echo "<br>";
var_dump($isStudent);
echo "<br>";

// 常量
const PI = 3.14; // 定义常量，define 是一个 PHP 内置函数，用于定义常量
const SITE_NAME = "PHP 开发者社区";
var_dump(SITE_NAME); // 打印常量类型和内容
echo "<br>";

// 可变变量
$variableName = "message";
$message = "Hello from variable variable!";
// 使用 $variableName 的值 "message" 作为变量名
echo $$variableName; // 输出 "Hello from variable variable!"
echo "<br>";
// 这等同于 echo $message;

// 变量引用，传值赋值和引用赋值
echo"<br>";
$var1 = "Hello";
//$var2 = $var1; // 传值赋值，$var2 是 $var1 的副本
// 这意味着 $var2 和 $var1 是两个独立的变量，修改一个不会影响另一个
$var3 = &$var1; // 引用赋值，$var2 是 $var1 的引用。两个值绑定在一起，任何一个值改变，另一个就会变
var_dump($var3); // 打印变量类型和内容

// var1 的内存地址：0x7f8c4c0b2a90
// var2 的内存地址：0x7f8c4c0b2a90
// var3 的内存地址：0x7f8c4c0b2a90
// 变量名：$var1, $var2, $var3
// 变量值：Hello

// 定义一个关联数组
$users = [
    'user1' => 'active',
    'user2' => 'inactive',
    'user3' => 'inactive',
    'user4' => 'active',
];
// 使用引用赋值修改数组中的值
foreach ($users as &$status) {
    if ($status === 'inactive') {
        $status = 'active'; // 修改值
    }
}
// 释放引用，避免后续操作意外修改最后一个元素
unset($status);
// 打印修改后的数组
echo "<br>";
print_r($users); // 打印数组类型和内容
echo "<br>";

// 魔术变量
echo __FILE__; // 当前文件的完整路径
echo "<br>";
echo __LINE__; // 当前行号
echo "<br>";
echo __DIR__; // 当前文件所在目录
echo "<br>";
class MyClass {
    public function myMethod() {
        echo __CLASS__; // 当前类名
        echo "<br>";
        echo __METHOD__; // 当前方法名
        echo "<br>";
        echo __FUNCTION__; // 当前函数名
    }
}

$myClass = new MyClass();
$myClass->myMethod(); // 调用方法 输出：MyClass::myMethod()
echo "<br>";
echo defined(PI)? 'PI is defined' : 'PI is not defined'; // 检查常量是否定义
if (!defined('PI')) {
    define('PI', 3.14); // 定义常量
}
echo "<br>";

// PHP 预定于常量
echo "<br>";
echo PHP_VERSION; // PHP 版本
echo "<br>";
echo PHP_OS; // 操作系统
echo "<br>";
echo PHP_INT_MAX; // 整数最大值
echo "<br>";
echo PHP_INT_SIZE; // 整数大小
echo "<br>";
echo PHP_FLOAT_MAX; // 浮点数最大值
echo "<br>";
echo PHP_FLOAT_MIN; // 浮点数最小值
echo "<br>";
echo PHP_EOL; // 换行符
echo "<br>";
echo TRUE; // 布尔值
echo "<br>";
echo FALSE; // 布尔值
echo "<br>";
echo NULL; // 空值
echo "<br>";

$a = []; // 空数组
if ($a) {
    echo "a is true";
} else {
    echo "a is false"; // 输出：a is false
}
echo "<br>";
if ($a) {
    echo "a is true";
} else {
    echo "a is false"; // 输出：a is false
}

echo "<br>";
$stringA = "Hello";
echo $stringA[0]; // 输出：Hello

// 数组
// 索引数组
$fruits = ["apple", "banana", "orange"];
$fruits[0] = "pear"; // 修改数组元素
// 关联数组
$person = [
    "name" => "张三",
    "age" => 23,
    "city" => "东京"
];
$person["age"] = 24; // 修改数组元素
echo "<br>";
echo $person[0]; // 输出：张三
echo "<br>";
echo $person["age"]; // 输出：24
echo "<br>";

// 类型强制转换
$price = "100"; // 字符串类型
var_dump((int)$price); // 转换为整数类型
echo "<br>";

var_dump(is_int($price)); // 检查变量类型：输出为 false
echo "<br>";
var_dump(is_string($price)); // 检查变量类型：输出为 true
echo "<br>";
var_dump(is_float($price)); // 检查变量类型：输出为 false
echo "<br>";
var_dump(is_bool($price)); // 检查变量类型：输出为 false
echo "<br>";
var_dump(is_array($price)); // 检查变量类型：输出为 false
echo "<br>";
var_dump(is_object($price)); // 检查变量类型：输出为 false
echo "<br>";
var_dump(is_null($price)); // 检查变量类型：输出为 false
echo "<br>";
$b = null;
var_dump(isset($b)); // 输出：false，isset（）检查变量是否被设置并且不是 null
echo "<br>";
var_dump(empty($b)); // 输出：true，empty（）检查变量是否为空
echo "<br>";
var_dump(gettype($person)); // 输出：array，gettype（）返回变量的类型
echo "<br>";
var_dump(gettype($price)); // 输出：string，gettype（）返回变量的类型
echo "<br>";

// 赋值运算符
$str = "Hello";
$str .= " World"; // 字符串连接，等同于 $str = $str . " World";
echo $str; // 输出：Hello World
echo "<br>";

$a = 10;
$b = 20;
var_dump($a <=> $b); // 输出：-1，三元运算符，如果 $a < $b 返回 -1，如果 $a > $b 返回 1，如果 $a == $b 返回 0