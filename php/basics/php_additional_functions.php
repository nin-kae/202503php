<?php

require_once './helpers.php';

// is_numeric() - 检查变量是否为数字或数字字符串
// 这个方法一般会用来判断一个变量是否是数字，例如在表单验证时，检查用户输入的值是否是数字
// 这个方法会返回 true 或 false

echoWithBr(is_numeric("123")); // 输出：1
echoWithBr(is_numeric("123abc")); // 输出:
echoWithBr(is_numeric("123.45")); // 输出: 1
echoWithBr(is_numeric("abc")); // 输出:  这种情况会返回 false, 输出在页面上是空的看不到
echoWithBr(is_numeric("")); // 输出:
echoWithBr(is_numeric(123)); // 输出: 1

echoHr();
$data = 100;
$typeString = gettype($data);

echoWithBr("变量 $data 的类型是：{$typeString}\n"); // 输出: 变量 $data 的类型是: integer

switch ($typeString) {
    case 'ingeter':
        echo "这是一个整数。\n";
        break;
    case 'string';
        echo "这是一个字符串。\n";
        break;
// ... 其他 case ...
    default:
        echo "这是一个其他类型。\n";
}

if ($typeString == 'integer') {
    echoWithBr("这是一个整数。\n");
} elseif ($typeString == 'string') {
    echo "这是一个字符串。\n";
} else {
    echoWithBr("这是一个其他类型。\n");
}

$value = "123.45"; // 初始是字符串
echoWithBr("初始类型: " . gettype($value) . ", 值: ");
varDumpWithBr($value); // string(6) "123.45"
echoWithBr("<br>");

// 转换为整数
// ingeter 是整数类型
settype($value, "integer");
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

// 绝对值
// negative 负数，positive 正的 > 0 的数
$negative_int = -10;
$positive_float = 5.7;

// abs 计算绝对值的数学函数
$abs_int = abs($negative_int);     // $abs_int 的值是 10
$abs_float = abs($positive_float);  // $abs_float 的值是 5.7

echoWithBr("abs(-10) = " . $abs_int . "\n");   // 输出: abs(-10) = 10
echoWithBr("abs(5.7) = " . $abs_float . "\n"); // 输出: abs(5.7) = 5.7

// 幂，平方根
$power = pow(2, 8);   // 2 的 8 次方
echoWithBr("2^8 = " . $power . "\n"); // 输出: 256

$sqrt_val = sqrt(144); // 144 的平方根
echoWithBr("sqrt(144) = " . $sqrt_val . "\n"); // 输出: 12

// 四舍五入 与 取整数
echoHr();
$pi = 3.1415926;
echoWithBr(round($pi, 2)); // 四舍五入保留两位小数，输出：3.14
echoWithBr(round($pi, 3)); // 四舍五入保留三位小数，输出：3.142

// 生成随机数
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
//echoWithBr(date('Y-m-d', strtotime('-1 year')));
echoWithBr(date("L", strtotime(date('Y-m-d', strtotime('-1year')))));

// PHP - Supplement D: 文件系统函数
echoHr();
$path1 = "/var/www/html/images/logo.png";
$path2 = "C:\\Users\\John\\Documents\\report.pdf";
$path3 = "myfile.txt"; // 只有文件名
$path4 = "/etc/php/"; // 目录

echo basename($path1); // 输出: logo.png
echo "<br>";
echo basename($path1, ".png"); // 输出: logo
echo "<br>";
echo basename($path2); // 输出: report.pdf (能处理 Windows 路径)
echo "<br>";
echo basename($path3); // 输出: myfile.txt
echo "<br>";
echo basename($path4); // 输出: php (返回最后的组件)

echoHr();
$path = "/var/www/html/images/logo.png";
echo dirname($path);      // 输出: /var/www/html/images
echo "<br>";
echo dirname($path, 2); // 输出: /var/www/html (向上两级)
echo "<br>";
echo dirname("/var/www/html"); // 输出: /var/www
echo "<br>";
echo dirname("myfile.txt"); // 输出: . (当前目录)

echoHr();
$path = "/var/www/html/images/logo.PNG";
// 获取所有信息
$infoAll = pathinfo($path);
echo "<pre>All info: ";
print_r($infoAll);
echo "</pre>";

echoWithBr(DIRECTORY_SEPARATOR); 

echoHr();
$file = './array_functions.php';
$dir = '/Library/WebServer/Documents/202503php/php/basics/';
if (file_exists($file)) {
    echoWithBr("文件 $file 存在。");
} else {
    echoWithBr("文件 $file 不存在。");
}

if (is_dir($dir)) {
    echoWithBr("目录 $dir 存在。");
} else {
    echoWithBr("文件 $file 不存在。");
}

if (is_file($file)) {
    echoWithBr("文件 $file 存在。");
} else {
    echoWithBr("文件 $file 不存在。");
}

echoWithBr(filetype($file)); // 输出：file

echoWithBr(disk_free_space($dir)); // 返回当前磁盘上可用的空间
echoWithBr(disk_free_space($dir)); // 返回当前磁盘的总空间

$childes = scandir($dir);
printRWithBr($childes); // 输出：目录下的所有文件和目录

echoHr();
$userInfo = [
    'name' => 'Elon Musk',
    'nickname' => '马书记',
    'age' => 30,
    'avatar' => 'https://example.com/avatar.jpg',
    'email' => 'test@example.com',
    'phone' => '1234567890',
    'address' => '123 Main St, City, Country',
    'bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
    'website' => 'https://example.com',
    'social' => [
        'facebook' => 'https://facebook.com/elonmusk',
        'twitter' => 'https://twitter.com/elonmusk',
        'linkedin' => 'https://linkedin.com/in/elonmusk',
    ],
    'skills' => [
        'PHP',
        'JavaScript',
        'HTML',
        'CSS',
        'MySQL',
    ],
    'projects' => [
        [
            'title' => 'Project 1',
            'description' => 'Description of project 1.',
            'url' => 'https://example.com/project1',
        ],
        [
            'title' => 'Project 2',
            'description' => 'Description of project 2.',
            'url' => 'https://example.com/project2',
        ],
    ],
    'education' => [
        [
            'degree' => 'Bachelor of Science in Computer Science',
            'institution' => 'University of Example',
            'year' => 2015,
        ],
        [
            'degree' => 'Master of Science in Software Engineering',
            'institution' => 'Example University',
            'year' => 2017,
        ],
    ],
];

// 使用 json_encode() 将数组转换为 JSON 字符串
echoWithBr(json_encode($userInfo));
$jsonString = json_encode($userInfo, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
echoWithBr("<pre>$jsonString</pre>");

$userInfoJson = '{"name":"Elon Musk","nickname":"\u9a6c\u4e66\u8bb0","age":30,"avatar":"https:\/\/example.com\/avatar.jpg","email":"test@example.com","phone":"1234567890","address":"123 Main St, City, Country","bio":"Lorem ipsum dolor sit amet, consectetur adipiscing elit.","website":"https:\/\/example.com","social":{"facebook":"https:\/\/facebook.com\/elonmusk","twitter":"https:\/\/twitter.com\/elonmusk","linkedin":"https:\/\/linkedin.com\/in\/elonmusk"},"skills":["PHP","JavaScript","HTML","CSS","MySQL"],"projects":[{"title":"Project 1","description":"Description of project 1.","url":"https:\/\/example.com\/project1"},{"title":"Project 2","description":"Description of project 2.","url":"https:\/\/example.com\/project2"}],"education":[{"degree":"Bachelor of Science in Computer Science","institution":"University of Example","year":2015},{"degree":"Master of Science in Software Engineering","institution":"Example University","year":2017}]}';
// 使用 json_decode() 将 JSON 字符串转换为 PHP 数组
$userInfoArray = json_decode($userInfoJson, true);
echo "<pre>";
printRWithBr($userInfoArray); // 输出: 数组
echo "</pre>";
echoWithBr($userInfoArray['nickname']); // 输出: 马书记

// 正则表达式
$string = "abc123def456ghi789";
$preg = '/\w{6}/';

$html = "<b>bold text</b> and <i>italic text</i>";

// 贪婪模式 (.* 匹配尽可能多的字符)
preg_match('/<b>(.*)</b>/', $html, $matches_greedy);
print_r($matches_greedy); // 输出: [0 => 'bold text and italic text', 1 => 'bold text and italic text']
echoHr();

// 懒惰模式 (.? 匹配尽可能少的字符，直到遇到第一个 )
preg_match('/<b>(.?)</b>/', $html, $matches_lazy);
print_r($matches_lazy); // 输出: [0 => 'bold text', 1 => 'bold text']

$email = "test@example.com";

// 一个相对简单的 Email 验证模式 (注意：完美的 Email 正则非常复杂)
// 解释:
// ^                  - 字符串开头
// [a-zA-Z0-9.*%+-]+  - 用户名部分：一个或多个字母、数字、点、下划线、百分号、加号、减号
// @                  - 字面的 "@" 符号
// [a-zA-Z0-9.-]+     - 域名部分：一个或多个字母、数字、点、减号
// .                 - 字面的 "." 符号 (需要转义)
// [a-zA-Z]{2,}       - 顶级域名：至少两个字母
// $                  - 字符串结尾
// i                  - 不区分大小写修正符
// 小括号 (...) 创建了捕获组
$pattern = '/^[a-zA-Z0-9.-]+@[a-zA-Z0-9.-]+$/i';

// 使用 preg_match 进行验证和捕获
if (preg_match($pattern, $email, $matches)) {
        // 如果 preg_match 返回 1，表示匹配成功
        echo "有效的 Email 地址。\n";
        echo "完整匹配: " . htmlspecialchars($matches[0]) . "\n";
        echo "用户名部分 (捕获组 1): " . htmlspecialchars($matches[1]) . "\n";
        echo "域名部分 (捕获组 2): " . htmlspecialchars($matches[2]) . "\n";
} else {
        // 如果 preg_match 返回 0 或 false
        echo "无效的 Email 地址格式。\n";
}
echoHr();

$text = "访问我们的网站 https://www.example.com 或查看 ftp://files.example.org/data.zip";

// 一个简化的 https://www.google.com/search?q=URL 匹配模式 (实际 https://www.google.com/search?q=URL 匹配可能更复杂)
// 匹配 http, https, ftp, ftps 协议
$pattern = '/\b(https?|ftps?)://[-A-Z0-9+&@#/%?=~|!:,.;]*[-A-Z0-9+&@#/%=~|]/i'; // i 不区分大小写

// 使用 preg_match_all 查找所有匹配项
$match_count = preg_match_all($pattern, $text, $all_matches, PREG_SET_ORDER); // 使用 PREG_SET_ORDER

if ($match_count > 0) {
    echo "找到了 " . $match_count . " 个 https://www.google.com/search?q=URL:\n";
    echo "<ul>";

    foreach ($all_matches as $match) {
    // $match[0] 是完整的 https://www.google.com/search?q=URL 匹配
    // $match[1] 是第一个捕获组 (协议部分)
    $url = htmlspecialchars($match[0]);
    $protocol = htmlspecialchars($match[1]);
    echo "<li>协议: {$protocol}, https://www.google.com/search?q=URL: {$url}</li>";
    }
    echo "</ul>";
    // echo "<pre>Matches array:\n"; print_r($all_matches); echo "</pre>";
} else {
    echo "没有找到 https://www.google.com/search?q=URL。\n";
}

echoHr();
// 3. 隐藏手机号中间四位数
$phone = "用户手机号：13812345678";
$pattern3 = '/(\d{3})\d{4}(\d{4})/'; // 捕获前三位和后四位
// $1 & $2 分别表示 第一个括号和第二个括号捕获到的字符串
$replacement3 = '$1****$2'; // 用 **** 替换中间四位
// $masked_phone 被掩码的手机号的变量名
$masked_phone = preg_replace($pattern3, $replacement3, $phone);
echo "原始: {$phone}\n";
echo "隐藏后: {$masked_phone}\n"; // 输出: 隐藏后: 用户手机号: 138****5678

echoHr();
// 表示“Markdown 格式的文本内容”
$markdown = "这是一个链接 [PHP官网](https://www.php.net) 和另一个 [搜索](https://www.google.com/search?q=URL)。";

// 模式：匹配 文字
// [(.?)] : 捕获链接文字 (非贪婪)
// (      : 匹配左括号
// (.?)   : 捕获 https://www.google.com/search?q=URL (非贪婪)
// )      : 匹配右括号
$pattern = '/([\b+])((\.?))/u';

// 定义回调函数
$callback = function($matches) {
    // $matches[0] 是整个匹配 "文字"
    // $matches[1] 是第一个捕获组 (文字)
    // $matches[2] 是第二个捕获组 (https://www.google.com/search?q=URL)
    $text = htmlspecialchars($matches[1], ENT_QUOTES, 'UTF-8'); // 对文字进行 HTML 转义
    $url = htmlspecialchars($matches[2], ENT_QUOTES, 'UTF-8');  // 对 https://www.google.com/search?q=URL 也进行转义 (防止属性注入)
    
    // 返回 HTML 链接标签
    return '<a href="' . $url . '" target="_blank">' . $text . '</a>';
};

// 执行替换
$html = preg_replace_callback($pattern, $callback, $markdown);

echo "Markdown: " . htmlspecialchars($markdown) . "\n<br>";
echo "HTML: " . htmlspecialchars($html) . "\n<br>"; // 查看源码
echo "渲染效果: " . $html . "\n"; // 在浏览器查看效果