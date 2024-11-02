<?php
function loadEnv($file) {
    if (!file_exists($file)) {
        throw new Exception("The .env file does not exist.");
    }

    $lines = file($file);
    $env = [];

    foreach ($lines as $line) {
        $line = trim($line);
        // Bỏ qua các dòng trống và chú thích
        if (empty($line) || $line[0] === '#') {
            continue;
        }
        // Tách key và value
        list($key, $value) = explode('=', $line, 2);
        $env[trim($key)] = trim($value);
    }

    return $env;
}

// Nạp biến môi trường
echo  __DIR__;

$env = loadEnv(__DIR__ . '/../.env');

// In ra biến môi trường
print_r($_SERVER['DOCUMENT_ROOT'] . "<br/>");
print_r($env['db']); // hoặc var_dump($env); để xem chi tiết hơn
