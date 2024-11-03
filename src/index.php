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
            $path    = './controller';
            $files = scandir($path);

            $directories = array_filter($files, function($item) use ($path) {
                return is_dir($path . '/' . $item) && $item !== '.' && $item !== '..';
            });

            $pathName = [];

            array_push($pathName, './controller/' . $class . ".php");

            foreach ($directories as $direc) {
                $pathController = './controller/' . $direc . "/" . $class . ".php";
                array_push($pathName, $pathController);
            }
        } else if(str_contains($class, 'Service')) {
            $pathName = [
                './service/' . $class . ".php",
            ];
        } else if(str_contains($class, 'Model')) {
            $pathName = [
                './model/' . $class . ".php",
            ];
        } else if(str_contains($class, 'Repository')) {
            $pathName = [
                './repository/' . $class . ".php",
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

    //Khởi tạo Env
    envLoaderService::loadEnv();

    //Kiểm tra cấu trúc URI
    $uri_path = [];

    for ($i = 1; $i < $n; $i++) {
        $className = isset($part[$i]) ? $part[$i] . "Controller" : null;

        if($className && class_exists($className)) {
            $controller = new $className();

            array_push($uri_path, $controller);
        } else {
            throw new Exception("Không tồn tại endpoint này " . $className);
        }
    }

    //Đi qua middleware
    for ($i = 0; $i < count($uri_path) - 1; $i ++) {
        $class = get_class($uri_path[$i]);
        $subclass = get_class($uri_path[$i+1]);

        if(!is_subclass_of($subclass, $class))
            throw new Exception("Cấu trúc api không hợp lệ");

        if(method_exists($uri_path[$i], "middleware"))
            $uri_path[$i]->middleware();
    }

    // Gửi request đến controller
    $className = isset($part[$n-1]) ? ($part[$n-1]) . 'Controller' : null;

    $controller = new $className();

    $method = $_SERVER['REQUEST_METHOD'];

    if (method_exists($controller, $method)) {
        $controller->$method();
    } else {
        throw new Exception("Method này không hợp lệ");
    }

    //Trả về Http.ok
    http_response_code(200);
    $responseData = [
        'date' => date('Y-m-d H:i:s'),
        'code' => "200",
        'message' => null,
        'path' => $_SERVER["REQUEST_URI"]
    ];

    echo json_encode($responseData);
} catch (Exception $e) {
    http_response_code(500);

    $responseData = [
        'date' => date('Y-m-d H:i:s'),
        'code' => "500",
        'message' => $e->getMessage(),
        'path' => $_SERVER["REQUEST_URI"]
    ];

    echo json_encode($responseData);
}
