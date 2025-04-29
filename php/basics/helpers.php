<?php

function varDumpWithBr($data): void
{
    var_dump($data);
    echo "<br>";
}

function echoWithBr($data): void
{
    // 这样写的话，只能安全输出字符串、整数、浮点数等基本类型，不能直接输出对象或数组，否则就报错！
    // echo $data;
    // echo "<br>";

    if (is_array($data) || is_object($data)) {
        echo '<pre>';
        print_r($data);
        echo '</pre><br>';
    } else {
        echo htmlspecialchars((string)$data) . '<br>';
    }
}

function printRWithBr($data): void
{
    print_r($data);
    echo "<br>";
}

function echoHr(): void
{
    echo "<hr>";
}