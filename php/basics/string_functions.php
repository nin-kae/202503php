<?php

// string Funtion in PHP
// 1. strlen() — 获取字符串的长度
echo strlen("Hello World!"); // 输出：12
// $返回值 = 函数名();
// echo $返回值; // 输出：12    
echo "<br>";

echo "「你好」所占的字节数是：" . strlen("你好"); // 输出：6
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

// 错误用法示例
//if (strpos($string, $findUpper) == false) { // 错误！当 $pos2 为 0 时， 0 == false 为 true！
//    echo "错误判断：'$findUpper' not found.\n"; // 这句会意外执行
//}
//echo "<br>";

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
// stripos 的使用，与 strpos 的功能一样，但不区分大小写
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
    echo "File is a PDF.<br>";; // 输出：File is a PDF.
}

// 替换字符串
// str_replace() 函数用于替换字符串中的某些字符或子字符串。
$text = "The quick brown fox jumps over the lazy dog.";
$newText = str_replace("quick", "PHP", $text); // 替换字符串
echo $newText . "<br>"; // 输出：The PHP brown fox jumps over the lazy dog.
echo "<br>";

$search = ["fox", "dog"];
$replace = ["cat", "bear"];
$newText2 = str_replace($search, $replace, $text, $count); // 替换多个字符串
echo "\n" . $newText2; // 输出：The quick brown cat jumps over the lazy bear.
echo "\n替换次数" . $count; // 输出：替换次数 2
echo "<br>";

// substr_replace() 函数用于替换字符串中的某些字符或子字符串。
$string = "abcdefghjkl";
echo substr_replace($string, "XYZ", 3, 2); // 从索引 3 开始，替换 2 个字符XYZ -> abcXYZfghjkl
echo "<br>";
$url = "https://lustormstout.com/avatar/default.png?userId=123";
echo substr_replace($url, 'https://', strpos($url, 'http://'), strlen('https://')); 
echo "<br>";
$email = 'renhuaying0401@gmail.com';
echo strstr($email, '@'); // 输出：@gmail.com
// echo substr_replace($email, '', strpos($email, '@')); // 输出：renhuaying0401
echo "<br>";
echo substr_replace($string, "XYZ", 3, 0); // 从索引 3 开始，插入XYZ -> abcXYZdefghjkl
echo "<br>";
echo substr_replace($string, "XYZ", -3,2); // 从倒数 3 开始，替换两个字符 -> abcdefghXYZ
echo "<br>";

// substr
echo substr($email, strpos($email, '@') + 1); // 输出：gmail.com +1 是把 @ 去掉
echo "<br>";
// @qq.cn
// @yahoo.jp.co

$url = 'https://www.mhlw.go.jp/search.html?q=123&cx=456&cof=789&ie=UTF-8';
$awsUrl = 'https://aws.amazon.com/cn/s3/?nc2=h_ql_prod_fs_s3';
echo substr($url, strpos($url, '?') + 1); // 输出：q=123&cx=456&cof=789&ie=UTF-8
echo "<br>";
echo substr($url, 0, -(strlen($url) - strrpos($url, '?'))); // 输出：q=123&cx=456&cof=789&ie=UTF-8
echo "<br>";
echo substr($awsUrl, 0, -(strlen($awsUrl) - strrpos($awsUrl, '?'))); // 输出：q=123&cx=456&cof=789&ie=UTF-8
echo "<br>";

$code = 'XfTd42';
// strtolower() 函数用于将字符串转换为小写字母。
echo strtolower($code); // 输出：xftd42
echo "<br>";
// strtoupper() 函数用于将字符串转换为大写字母。
echo strtoupper($code); // 输出：XFTD42
echo "<br>";

$fileName = 'learning_php_counstrust.php';
$fileName = substr($fileName, 0, -(strlen($fileName) - strpos($fileName,'.')));
$fileName = str_replace('_', '', $fileName); // 替换下划线为换行符
// ucwords() 函数用于将字符串的每个单词的首字母转换为大写字母。
echo ucwords($fileName); // 输出：Learning Php Counstrust
echo "<br>";

// trim
$string = ' PHP ';
echo strlen($string); // 输出：PHP
echo "<br>";
$trimString = trim($string);
echo strlen($trimString); // 去掉字符串两端的空格
echo "<br>";
// 接收参数：电话号码，邮箱，地址
$str2 = "/path/to/file";
echo trim($str2, "/"); // 去掉字符串两端的斜杠
echo "<br>";

$name = "Alice";
$age = 25;
$score = 85.7;

$outputString = sprintf("姓名：%s，年龄：%d，分数：%.1f%%", $name, $age, $score); // 格式化字符串
echo $outputString; // 输出：姓名：Alice，年龄：25，分数：85.7%
printf("ID: %05d", 123); // 输出：ID: 00123
echo "<br>";
// product type: 1, 2, 8 (ids) 可能对应的就是 categories 表的 ID = 1, ID = 2, ID = 8

$products = [
    [
        'name' => 'iPhone',
        'price' => 198,
        'categories' => [
            ['id' => 1, 'name' => '手机'],
            ['id' => 2, 'name' => '数码'],
            ['id' => 8, 'name' => '苹果']
        ]
    ],
    [
        'name' => 'iPhone',
        'price' => 198,
        'categories' => [
            ['id' => 1, 'name' => '手机']
        ]
    ]
];
$productType = '1, 2, 8'; // 可能对应的就是 categories 表的 ID = 1, ID = 2, ID = 8
$productTypeArr = explode(',', $productType); // 将字符串转换为数组
echo "<br>";
$keywordsArr = ["黑色", "足球鞋", "男款"];
$keywordsStr = implode(',', $keywordsArr); // 将数组转换为字符串
echo $keywordsStr; // 输出：黑色,足球鞋,男款
echo "<br>";

//互为逆操作
$productSearchKeywordsArr = ['黑色', '足训鞋', '真皮', '亚瑟士', '足球鞋'];
$searchCondition = "黑色足球鞋男款";
// mb 是多字节；split 是分割字符串的函数
$searchConditionArr1 = mb_str_split($searchCondition, 2); // 将字符串转换为数组
$searchConditionArr2 = mb_str_split('足球鞋男款', 3); // 将字符串转换为数组
var_dump($searchConditionArr1); // 输出：array(3) { [0]=> string(6) "黑色" [1]=> string(6) "足球鞋" [2]=> string(6) "男款" }
$intersection1 = array_intersect($productSearchKeywordsArr, $searchConditionArr1); // 交集
$intersection2 = array_intersect($productSearchKeywordsArr, $searchConditionArr2); // 交集
echo "<br>";
$matchCount = count($intersection1) + count($intersection2); // 计算交集的数量
var_dump($matchCount);
echo'&nbsp;你好 ';
echo "<br>";
echo "<h1>这是一个 h1 标签</h1>";
echo "&lt;h1&gt;这是一个 h1 标签&lt;/h1&gt;";
echo "<br>";
// echo "<script>alert('你的网站被我黑了！')</script>";
// 把特殊的 HTML 字符转换成“安全的实体符号”
// 这样可以防止 HTML 被浏览器当作代码执行，常用于防止 XSS 攻击（跨站脚本攻击
echo htmlspecialchars("<script>alert('你的网站被我黑了！')</script>"); // 转义 HTML 特殊字符
echo "<br>";
echo strip_tags("<h1>这是一个 h1 标签</h1>"); // strip_tags 去掉 HTML 标签
echo "<br>";
$str = strip_tags("<?php echo 123; ?>ss"); // strip_tags 去掉 PHP 标签
echo $str;
echo "<br>";
$html = "<p><i>这是</i>一段<b>加粗</b>的<scrpit>alert('oops');</scrpit>文本</p>";
echo strip_tags($html); // 输出：这是一段加粗的alert('oops');文本。
echo "\n";
echo strip_tags($html, '<p><b><i>'); // 输出：这是一段加粗的alert('oops');文本。
$query = "搜索 词";
// urlencode() 会把字符串中不能直接出现在 URL 里的特殊字符，转换成安全的“百分号编码”形式，以便它能作为 URL 的一部分传输。
$url = "https://www.example.com/search?q=" . urlencode($query);
echo $url; // 输出：https://www.example.com/search?q=%E6%90%9C%E7%B4%A2%20%E8%AF%8D

$path = "文件 名.txt";
//rawurlencode() 会将字符串中的特殊字符转换为 百分号编码（%XX），以确保可以安全放入 URL 中。
$urlPath = "https://example.com/files/" . rawurlencode($path);
echo "\n" . $urlPath; // 输出：https://example.com/files/%E6%96%87%E4%BB%B6%20%E5%90%8D.txt
echo "<br>";
parse_str('key1=value1&key2=value2', $result); // 将查询字符串解析为数组
// var_dump 内置函数；用来查看一个变量的类型和值的。
var_dump($result);
echo "<br>";
$params = [
    'search' => 'PHP 教程',
    'page' => 1,
    'filters' => ['free', 'beginner'] // 数组被处理
];
$queryString = http_build_query($params); // 将数组转换为查询字符串
echo $queryString;
echo "<br>";