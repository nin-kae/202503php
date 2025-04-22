<?php

require_once './helpers.php';

$userInfo = array();
$userInfo = array(1, 2, 3);
$userInfo = array(
    'username' => 'ninkae',
    'age' => 20
);

// 推荐数组使用 []
$userInfo = [
    'username' => 'ninkae',
    'age' => 20
];
var_dump($userInfo);
echo "<br>";
$emptyArr = [];
var_dump($emptyArr);
echo"<br>";

$fruits = ["apple", "banana", "orange"];
echo count($fruits) . "<br>"; // 输出：3

$nested = [1, 2, [3, 4], 5];
echo count($nested) . "<br>"; // 输出：4（只计算第一层）
echo count($nested, COUNT_RECURSIVE) . "<br>"; // 输出：6 （计算了内部数组的元素）

$arr = [];
$str = "hello";
var_dump(is_array($arr)); // 输出：bool(true)
var_dump(is_array($str)); // 输出：bool（false）
echo "<br>";

$orders = [
    [
        "id" => 1,
        'amount' => 300,
        'product_name' => 'iphone',
    //  'status' => 1,  
    ],
    [
        "id" => 1,
        'amount' => 300,
        'product_name' => 'iphone',
        'status' => 2,
    ],
    '',
];
// echo json_encode($orders);
// echo "<br>";
foreach ($orders as &$order) {
// 如果有多层嵌套的数据需要多层循环来处理里面数据的时候, 需要注意里面的某些节点可能类型不是数据直接使用 foreach 的话会报错
//    if (is_array($order)) {
//        foreach ($order as $key => &$value){
//            if ($key === 'status' && $value === 1){
//                $value = '已发货';
//            }
//        }
//    }

    if (is_array($order) && array_key_exists('status', $order)) {
        if ($order['status'] === 1) $order['status'] = '已支付';
        if ($order['status'] === 2) $order['status'] = '已发货';
    }
}
var_dump($orders);
echo "<br>";

$stack = ["a", "b", "c"];
foreach ($stack as $item) {
    $last = array_pop($stack);
    echo "Popped: " . $last; // 输出：Popped: c ...
    echo "<br>";
}
print_r($stack); // 输出：Array ()
echo "<br>";

// 排队逻辑
$buyXiaomiQueue = [];
$user1 = '张三';
$user2 = '李四';
$user3 = '王五';
array_unshift($buyXiaomiQueue, $user2);
// ...
array_unshift($buyXiaomiQueue, $user1);
// ...
array_unshift($buyXiaomiQueue, $user3);
var_dump($buyXiaomiQueue);
echo "<br>";

// 生成购买订单
$userOrder1 = array_pop($buyXiaomiQueue);
echo $userOrder1 . "<br>";
$userOrder2 = array_pop($buyXiaomiQueue);
echo $userOrder2 . "<br>";
var_dump($buyXiaomiQueue); // 输出：array(2) { [0]=> string(7) "小米11" [1]=> string(7) "小米12" }
echo "<br>";

$arr = [0 => "apple", 1 => "banana", 2 => "cherry"];
unset($arr[1]); // 删除索引为 1 的元素
print_r($arr); // 输出：Array ( [0] => apple [2] => cherry )
echo "<br>";

// 如果想删除后重新索引，可以使用 array_values 函数
$reindexed = array_values($arr);
print_r($reindexed); // 输出：Array ( [0] => apple [1] => cherry )
echo "<br>";

echo $fruits[0] . "<br>"; // 输出：apple
echo $userInfo['username'] . "<br>"; // 输出：张三
var_dump(array_key_exists('username', $userInfo)); // 检查键是否存在，输出：true
echo "<br>";
var_dump(array_key_exists('email', $userInfo)); // 检查键是否存在，输出：false
echo "<br>";

$user = ['name' => 'Bob', 'age' => 25, 'city' => 'London', 'status' => 'active'];
$keys = array_keys($user);
// ['name', 'age', 'city', 'status'];
print_r($keys); // 输出：Array ( [0] => name [1] => age [2] => city [3] => status )
echo "<br>";

$values = array_values($user);
// ['Bob', 25, 'London', 'active'];
print_r($values); // 输出：Array ( [0] => Bob [1] => 25 [2] => London [3] => active )
echo "<br>";

$ages = ['Alice' => 30, 'Bob' => 25, 'Charlie' => 30];
$keysOf30 = array_keys($ages, 30);
print_r($keysOf30); // 输出：Array ( [0] => Alice [1] => Charlie )
echo "<br>";

$os = ['Mac', 'Windows', 'Linux', 0];

var_dump(in_array('Linux', $os)); // 输出：true
var_dump(in_array('linux', $os)); // 输出：false (区分大小写)
var_dump(in_array(0, $os)); // 输出：true
var_dump(in_array('0', $os)); // 输出：false (类型不匹配)
var_dump(in_array(0, $os, true)); // 输出：true (严格模式，类型匹配 int(0) !== string(0))

$roleRelationPermissions = [
    1 => ['create', 'update', 'view'],
    2 => ['create', 'update', 'view', 'delete'],
];

$userCanOptionsArticleRoles = [1, 2];
// $authorPermissions = ['create', 'update', 'create'];
$userRole = 1;
$can = in_array($userRole, $userCanOptionsArticleRoles);
var_dump($can); // 输出：true
echo "<br>";

$key1 = array_search('Windows', $os);
// $key1 = array_search(25, $ages);
var_dump($key1); // 输出：1
echo "<br>";

$arr1 = ['color' => 'red', 0 => 'a', 1 => 'b'];
$arr2 = ['color' => 'green', 'shape' => 'circle', 1 => 'c', 2 => 'd'];

$merged = array_merge($arr1, $arr2);
print_r($merged);
echo "<br>";

$base = ['color' => 'red', 'shape' => 'square', 0 => 10, 1=> 20];
$replacements = ['color' => 'blue', 1 => 25, 'border' => 'dotted'];
$replaced = array_replace($base, $replacements);
print_r($replaced);
echo "<br>";

$input = ['a', 'b', 'c', 'd', 'e'];

$slice1 = array_slice($input, 2); // 从索引 2 到末尾 -> ['c', 'd', 'e'] (索引变为 0, 1, 2 )
$slice2 = array_slice($input, 2, 2); // 从索引 2 开始，取 2 个 -> ['c', 'd'] (索引变为 0, 1)
$slice3 = array_slice($input, 1, -1); // 从索引 1 开始，到倒数第 1 个之前结束 -> ['b', 'c', 'd']
$slice4 = array_slice($input, -2, 1); // 从倒数第 2 个开始，取 1 个 -> ['d']
$assoc = ['x' => 10, 'y' => 20, 'z' => 30];
$slice5 = array_slice($assoc, 1, null, true); // 从索引 1 开始，保留键名 -> ['y' => 20, 'z' => 30]
print_r($slice1);
echo "<br>";
print_r($slice2);
echo "<br>";
print_r($slice3);
echo "<br>";
print_r($slice4);
echo "<br>";
print_r($slice5);
echo "<br>";

// & 我们也叫做「地址传递符」

echoHr();
$input = ["red", "green", "blue", "yellow"];
// 移除从索引 2 开始的两个元素
$removed1 = array_splice($input, 2, 2);
printRWithBr($input); // 输出: Array ( [0] => red [1] => green )
printRWithBr($removed1); // 输出: Array ( [0] => blue [1] => yellow )

$input = ['red', 'green', 'blue', 'yellow'];
// 移除从索引 1 开始的一个元素，并用"orange", "purple" 替换
$removed2 = array_splice($input, 1, 1, ["orange", "purple"]);
printRWithBr($input); // 输出: Array ( [0] => red [1] => orange [2] => purple [3] => blue [4] => yellow ) (键已重排)
printRWithBr($removed2); // 输出：Array ( [0] => green )

echoHr();
function square($n): float|int
{
    return $n * $n;
}
echo "<br>";

$numbers = [1, 2, 3, 4];
$squares = array_map('square', $numbers); // 使用函数名
printRWithBr($squares); // 输出: Array ( [0] => 1 [1] => 4 [2] => 9 [3] => 16 )

$lower = ['a', 'b', 'c'];
// ['A', 'B', 'C']
$upper = array_map('strtoupper', $lower); // 使用内建函数
printRWithBr($upper); // 输出: Array ( [0] => A [1] => B [2] => C )

// 也可以这样
// $upperArr = explode(',', strtoupper(implode(',', $lower)));

$nums1 = [1, 2, 3];
$nums2 = [10, 20, 30];
$nums = array_map(fn($n1, $n2) => $n1 + $n2, $nums1, $nums2); // 使用箭头函数处理多个数组
printRWithBr($nums); // 输出: Array ( [0] => 11 [1] => 22 [2] => 33 )

$users = [
    ['id' => 1, 'username' => '张三', 'is_admin' => 1, 'register_from' => 1],
    ['id' => 2, 'username' => '张三', 'is_admin' => 2, 'register_from' => 2]
];
$usersData = array_map(function ($user) {
    $user['is_admin'] = $user['is_admin'] ? '管理员' : '用户';
    if ($user['register_from'] === 1) $user['register_from'] = 'Google';
    if ($user['register_from'] === 2) $user['register_from'] = 'Apple';
    return $user;
}, $users);
echoWithBr(json_encode($usersData));

echoHr();
$numbers = [1, 2, 3, 4, 5, 6];
$even = array_filter($numbers, fn($n) => $n % 2 === 0);
printRWithBr($even); // 输出： Array ( [1] => 2 [3] => 4 [5] => 6 ) (保留了键名 1, 3, 5)

$mixed = [0, 1, false, true, "", "hello", null, []];
// array_filter 用来过滤 notEmpty 的值
$notEmpty = array_filter($mixed); // 省略回调，移除所有 falsey 值
printRWithBr($notEmpty); // 输出 Array ( [1] => 1 [3] => 1 [5] => hello ) (true 被转为 1 输出)

$assoc = ['a' => 1, 'b' => 2, 'c' => 3];
// 过滤掉键名不是 'a' 的元素
$onlyA = arry_filter($assoc, fn($key) => $key === 'a', ARRAY_FILTER_USE_KRY);
printRWithBr($onlyA); // 输出：Array ( [a] => 1 )

// 需要渲染的字符串 The next F1 race will be in {{ city }} on {{ date }}.
// 给定的变量值 ['city' => 'Melbourne', 'date' => '2022-04-08']
// 执行结果 The next F1 race will be in Melbourne on 2022-04-08.

// ['city' => 'Melbourne', 'date' => '2022-04-08', 'weather' => '晴天']
// The next F1 race will be in {{ city }} on {{ date }} as {{ weather }}.

// // 用 简单变量 输出
// $city = 'Melbourne';
// $date = '2022-04-08';
// // $weather = '晴天';
// echo "The next F1 race will be in $city on $date.";
// echo "<br>";

// // 用 str_replace 代替
// $string = "The next F1 race will be in city on date.";
// $string = substr_replace($string, "Melbourne", 28, 4);
// echo substr_replace($string, "2022-04-08", 41, 4);
// echo "<br>";

// // sprintf 格式化字符串
// $weather = "晴天";
// $result = sprintf("The next F1 race will be in %s on %s ssas %s.", $city, $date, $weather);
// echo $result;
// echo "<br>";

// // 匿名函数
// $greet = function($city, $date, $weather) {
//     echo "The next F1 race will be in " . $city . " on " . $date . " ssas " . $weather . ".<br>";
// };
// $greet('Melbourne', '2022-04-08', '晴天');
// echo "<br>";

// search & str_replace
$string = "The next F1 race will be in {{ city }} on {{ date }} as {{ weather }}.";
$values = [ 'city' => 'Melbourne', 'date' => '2022-04-08', 'weather' => '晴天'];

$search = [];
$replace = [];
foreach ($values as $item => $value) {
    $search[] = "{{ $item }}";
    $replace[] = $value;
}

$result = str_replace($search, $replace, $string);
echo $result;

// 计算数组元素的和
echoHr();
$numbers = [1, 2, 3, 4, 5];

$sum = array_reduce($numbers, fn($carry, $item) => $carry + $item, 0); // 初始值为 0
echoWithBr("Sum: " . $sum); // 输出：Sum： 15

// 将数组元素连接成字符串
$string = array_reduce($numbers, fn($carry, $item) => $carry . "_" . $item, "Numbers:"); // 初始值为 "Number:"
echoWithBr("\nString: " . $string); // 输出：String：Numbers:-1-2-3-4-5

// 打印每个元素
echoHr();
$fruits = ['a' => 'apple', 'b' => 'banana'];

array_walk($fruits, function($value, $key) {
    echoWithBr($key . "=>" . $value . "\n");
});

// 修改数组元素（注意 &）
$numbers = [1, 2, 3];
array_walk($numbers, function(&$value) {
    $value *= 10;
});
printRWithBr($numbers); // 输出：Array ( [0] => 10 [1] => 20 [2] => 30 )

echoHr();
$numbers = [3, 1, 4, 1, 5, 9];
// sort 对数组进行排序 (按值从小到大)；rsort 则相反
sort($numbers);
printRWithBr($numbers); // 输出：Array ( [0] => 1 [1] => 1 [2] => 3 [3] => 4 [4] => 5 [5] => 9 )(键被重置)
arsort($numbers);
printRWithBr($numbers); // 输出：Array ( [0] => 9 [1] => 5 [2] => 4 [3] => 3 [4] => 1 [5] => 1 )(键被重置)
// 应用：1.成绩排名
$scores = ['Alice' => 85, 'Bob' => 92, 'Charlie' => 78];
asort($scores); // 按分数生序，保留名字键
printRWithBr($scores); // 输出
rsort($scores); // 按分数降序
printRWithBr($scores); // 输出
$files = ['img12.png', 'img10.png', 'img2.png', 'img1.png'];
natsort($files); // 自然排序
printRWithBr($files); // 输出: Array ( [3] => img1.png [2] => img2.png [1] => img10.png [0] => img12.png ) (键保留)
$input = ["a", "b", "a", "c", "b", "b"];
// 从数组中移除重复的值，只保留唯一的元素
$unique = array_unique($input);
printRWithBr($unique); // 输出: Array ( [0] => a [1] => b [3] => c )

$array1 = ["a" => "green", "red", "blue", "red"];
$array2 = ["b" => "green", "yellow", "red"];

// diff 差集
$diff = array_diff($array1, $array2);
printRWithBr($diff); // 输出：Array ( [1] => blue )( 'green' 和 'red' 在 $array2 中也存在)

$intersect = array_intersect($array1, $array2);
print_r($intersect); // 输出: Array ( [a] => green [0] => red [2] => red )

$numbers = [1, 2, 3, 4.5];
echoWithBr("Sum: " . array_sum($numbers)); // 输出：Sum: 10.5

$input = ["a" => 1, "b" => 2, "c" => 3];
// array_flip 将数组中的键和值互换
$flipped = array_flip($input);
printRWithBr($flipped); // 输出: Array ( [1] => a [2] => b [3] => c )
printRWithBr(array_flip($scores)); // 输出: Array ( [85] => Alice [92] => Bob [78] => Charlie ) (分数作为键)
$numbers = [3, 1, 4, 1, 5, 9];
// 返回一个顺序相反的数组（倒序排列）
printRWithBr(array_reverse($numbers)); // 输出: Array ( [0] => 9 [1] => 5 [2] => 4 [3] => 3 [4] => 1 [5] => 1 ) (键被重置)

// 转换为整数
settype($value, "ingeter");
echoWithBr("转换为 int 后：" . gettype($value) . ", 值：");
varDumpWithBr($value); // integer, int(123)(小数部分截断)
echoWithBr("<br>");

echoHr();
$value = "123.45"; // 初始是字符串
varDumpWithBr(intval($value)); // 转换为整数
varDumpWithBr((int)$value); // 转换为整数
varDumpWithBr((float)$value); // 转换为浮点数

echoHr();
varDumpWithBr(empty($student));
// if (!empty($student)) {
//      todo something
// }
$classes = [
    'class1' => ['student1', 'student2'],
    'class2' => ['student3', 'student4'],
];
unset($classes['class1']); // 删除 class1
varDumpWithBr($classes); // class2 => student3,student4

echoHr();
$pi = 3.1415926;
echoWithBr(round($pi, 2)); // 四舍五入保留两位小数，输出：3.14
echoWithBr(round($pi, 3)); // 四舍五入保留三位小数，输出：3.142

echoWithBr(mt_rand(1, 100)); // 输出：随机数，1 到 100 之间

try {
    $password = random_int(100000, 999999) . bin2hex(random_bytes(10));
} catch (RandomException $e) {
    echo "生成随机密码失败：" . $e -> getMessage();
    exit;
}
echoWithBr($password); // 输出：随机密码，10 位随机字符串

echoHr();
echoWithBr(time()); // 输出：当前时间戳，当前时间戳就是从 Unix 纪元 (1970 年 1 月 1 日 00:00:00 GMT) 到现在的秒数
echoWithBr(microtime(true)); // 输出：当前时间戳，包含微妙
echoWithBr("请求开始时间(秒)：" . ($_SERVER['REQUEST_TIME'] ?? 'N/A') . "\n");
echoWithBr("请求开始时间(带微妙)：" . ($_SERVER['REQUEST_TIME_FLOAT'] ?? 'N/A') . "\n");
echoWithBr(date("L", strtotime(date('Y-m-d', strtotime('-1year')))));

