<?php

// 数据运算符
$arr1 = ['a' => 1, 'b' => 2];
$arr2 = ['b' => 3, 'c' => 4];
$union = $arr1 + $arr2; // 数组合并
var_dump($union); // 输出：arry(3) { ["a"] => int(1) ["b"] => int(2) ["c"] => int(4)} 打印合并后的数组
echo "<br>";

$arr3 = ['a' => 1, 'b' => '2']; // 注意‘2’是字符串
$arr4 = ['b' => 2, 'a' => 1]; // 顺序不同，‘b’的值是整数
var_dump($arr1 == $arr3); // 输出：bool(true) == 的时候值的类型无关，只判断值本身，PHP 会自动转换类型在比较的时候
var_dump($arr1 === $arr3); // 输出：bool(false) ,顺序相同，值的类型不同
var_dump($arr1 = $arr4); // 输出：bool(true) == 的时候顺序无关
var_dump($arr1 === $arr4); // 输出：bool(false) ,顺序不同
// var_dump($arr1 != $arr3); // 输出：bool(false) != 的时候值的类型无关，只判断值本身，PHP 会自动转换类型在比较的时候
echo "<br>";
var_dump(array_merge($arr1, $arr2)); // 数组合并
//输出：array(3) { ["a"] => int(1) ["b"] => int(3) ["c"] => int(4)},array_merge() 会覆盖相同的键

// 条件赋值运算符
$age = 20;
$status = ($age >= 18) ? '成年' : '未成年'; //三元运算符
echo "<br>";
echo $status; // 输出：成年

$username = $_GET['user'] ?: 'guest';
echo "<br>";
echo $username; // 如果 $_GET['user'] 存在且不为空，则输出 $_GET['user'] 的值，否则输出 'guset'
echo "<br>";
echo $name; // 如果 $_GET['username'] 存在且不为 null，则输出$_GET['username'] 的值，否则输出'默认用户'

$nickname = $userNickname ?? $userPhone ?? $userEmail ?? '匿名用户'; // 如果 $userNickname, $userPhone, $userEmail 都不存在，则输出 '匿名用户'
echo "<br>";
echo $nickname; // 输出：匿名用户
echo "<br>";

$userAvatar ??= 'default.png'; // 如果 $userAvatar 不存在，则赋值为 'default.png'
echo $userAvatar; // 输出：default.png
echo "<br>";

// 条件语句 （if...else语句）
$age = 20;
if ($age >= 18) {
    echo "成年";
} elseif ($age >= 12) {
    echo "青少年";
} else {
    echo "未成年";
}
echo "<br>";

$score = 85;
if ($score >= 60) {
    echo "成绩及格";
} else {
    echo "成绩不及格";
}
echo "<br>";

$score = 85;
if ($score >= 90) {
    echo "优秀(A)";
} elseif ($score >= 80) { // 到这里时，$score >= 90 肯定为false 了
    echo "良好(B)"; // 因为 85 >= 80，执行这句，然后跳出整个结构
} elseif ($score >= 70) {
    echo "中等(C)";
} elseif ($score >= 60) {
    echo "及格(D)";
} else {
    echo "不及格(F)";
}
echo "<br>";

// switch 语句
$role = 'editor'; //假设用户角色是编辑

switch ($role) {
    case 'admin':
        echo "欢迎管理员";
        break; // 执行完 admin 的就跳出
    
    case 'editor':
        echo "显示：文章管\n";
        // 注意这里故意没有break！会继续执行下面的case

    case 'author':
        echo "显示：写新文章\n";
        break;

    default:
        echo "无效的角色或未登录用户。\n";
}

// for 循环
for ($i = 0; $i < 5; $i++) {
    echo "循环第 $i 次循环\n";
}
echo "<br>";

// while 循环
$i = 0; // 初始化在循环外
while ($i < 5) { // 条件判断在循环开始前
    echo "当前数字是：" . $i . "\n";
    $i++; // 更新计数器在循环体内
}

// while (true){
//     echo "无线循环\n";
//     break; // 这里是为了防止死循环
// }

//do... while 循环
$attempts = 0;
$success = false;

do {
    $attempts++;
    echo "尝试第 " . $attempts . " 次链接...\n";
    // 假设 connection_attempt() 返回 true 或 false
    // $success = connection_attempt();
    if ($attempts >= 5) { // 模拟链接成功或达到最大尝试次数
        if (rand(0,1)){
            $success = true; // 模拟成功
            echo "链接成功！\n";
        } elseif ($attempts >= 5) {
            echo "达到最大尝试次数，链接失败！\n";
            break; // 达到最大尝试次数，跳出循环
        }
    }
    //if (!$success) sleep(1); // 如果没有成功，等待1秒再尝试
    } while (!$success); // 只要 $success 为 false，就继续循环
echo "总共尝试了 " . $attempts . " 次链接。\n";
echo "<br>";

// foreach 循环
$fruits = ['apple', 'banana', 'orange'];
    foreach ($fruits as $fruit) {
        echo "水果是：". $fruit . "\n";
        echo "<br>";
}

foreach ($fruits as $index => $fruit) {
    echo "索引是：". $index . ",水果：" . $fruit . "\n";
    echo "<br>";
}

// foreach 循环遍历关联数组
$person = [
    "name" => "张三",
    "age" => 23,
    "city" => "东京"
];
foreach ($person as $key => $value) {
    echo "键：" . $key . ", 值：" . $value . "\n";
    echo "<br>";
}

// 通过引用修改数组元素
$fruits = ['apple' => 100, 'banana' => 80, 'orange' => 60];
foreach ($fruits as $key => &$price) { // 注意这里的 & 符号
    $price *= 0.9; // 打九折
}

unset($price); // 解除引用,防止后续代码影响
var_dump($fruits); // 输出：array(3) { ["apple"] => float(90) ["banana"] => float(72) ["orange"] => float(54) }
echo "<br>";

// 多位数组
$orders = [
    ['userId' => 1, 'productName' => 'apple', 'price' => 20],
    ['userId' => 2, 'productName' => 'banana', 'price' => 30],
    ['userId' => 3, 'productName' => 'orange', 'price' => 18]
];

foreach ($orders as $order) {
    echo "用户ID：" . $order['userId'] . "\n";
    echo "<br>";
    echo "商品名称：" . $order['productName'] . "\n";
    echo "<br>";
    echo "价格：" . $order['price'] . "\n";
    echo "<br>";
}

$users = [
    ['name' => '张三', 'age' => 23, 'isAdmin' => 0],
    ['name' => '李四', 'age' => 25, 'isAdmin' => 0],
    ['name' => '王五', 'age' => 30, 'isAdmin' => 1]
];
foreach ($users as $user) {
    if (!$users['isAdmin']){
        continue; // 如果不是管理员，跳过
    }
    echo "这里执行管理员的代码\n";
    echo "<br>";
}