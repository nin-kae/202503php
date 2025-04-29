<?php

function varDumpWithBr($data): void
{
    var_dump($data);
    echo "<br>";
}

function echoWithBr($data): void
{
    echo $data;
    echo "<br>";

    /**
     * if (is_array($data) || is_object($data)) {
     *    echo '<pre>';
     *   print_r($data);
     *  echo '</pre><br>';
     * } else {
     * echo htmlspecialchars((string)$data) . '<br>';
     * }
     */
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