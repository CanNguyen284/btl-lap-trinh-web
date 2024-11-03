<?php

header('Content-Type: application/json');

require '../vendor/autoload.php';

// Cấu hình bắt lỗi Exception
set_exception_handler(function ($exception) {
    http_response_code(500);
    echo json_encode([
        'date' => date('Y-m-d H:i:s'),
        'code' => "500",
        'message' => $exception->getMessage(),
        'file' => $exception->getFile(),
        'line' => $exception->getLine()
    ]);
});

// Cấu hình bắt lỗi PHP Warning, Notice
set_error_handler(function ($severity, $message, $file, $line) {
    http_response_code(500);
    echo json_encode([
        'date' => date('Y-m-d H:i:s'),
        'code' => "500",
        'message' => $message,
        'file' => $file,
        'line' => $line
    ]);
    exit();
});

try {
    spl_autoload_register(function ($class) {
        $pathName = [];

        if (str_contains($class, 'Controller')) {
            $pathName = [
                './controller/' . $class . ".php",
                './controller/authentication/' . $class . ".php",
            ];
        } else if(str_contains($class, 'Service')) {
            $pathName = [
                './service/' . $class . ".php",
            ];
        } else {
            return;
        }

        $find = [false, null];

        foreach ($pathName as $path) {
            if (file_exists($path)) {
                $find = [true, $path];
                break;
            }
        }

        if (!$find[0]) {
            throw new Exception("Không tìm thấy controller thích hợp: " . $class);
        }

        require $find[1];

        if (!class_exists($class)) {
            throw new Exception("Không tìm thấy class: " . $class);
        }
    });

    $part = explode("/", $_SERVER["REQUEST_URI"]);
    $n = count($part);

    if($n < 2 || !isset($part[$n-1]))
        throw new Exception("Endpoint không hợp lệ!");

    //Đi qua middleware
    for ($i = 1; $i < $n - 1; $i++) {
        $className = isset($part[$i]) ? $part[$i] . "Controller" : null;

        if($className && class_exists($className)) {
            $controller = new $className();

            if (method_exists($controller, 'middleware'))
                $controller->middleware();
        } else {
            throw new Exception("Không tồn tại endpoint này " . $className);
        }
    }


    // Tạo Class
    $className = isset($part[$n-1]) ? ($part[$n-1]) . 'Controller' : null;

    $controller = new $className();

    $method = $_SERVER['REQUEST_METHOD'];

    if (method_exists($controller, $method)) {
        envLoaderService::loadEnv();
        $controller->$method();
    } else {
        throw new Exception("Method này không hợp lệ");
    }


} catch (Exception $e) {
    $responseData = [
        'date' => date('Y-m-d H:i:s'),
        'code' => "500",
        'message' => $e->getMessage(),
        'path' => $_SERVER["REQUEST_URI"]
    ];

    echo json_encode($responseData);
}
