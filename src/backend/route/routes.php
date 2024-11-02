<?php

class Router {
    protected static $routes = [];

    public static function get($route, $action) {
        self::$routes['GET'][$route] = $action;
    }

    public static function post($route, $action) {
        self::$routes['POST'][$route] = $action;
    }

    public static function dispatch($url) {
        $method = $_SERVER['REQUEST_METHOD'];
        $action = self::$routes[$method][$url] ? self::$routes[$method][$url] : null;

        if ($action) {
            list($controller, $method) = explode('@', $action);
            require_once "../app/controllers/$controller.php";
            $controller = new $controller;
            $controller->$method();
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}

// Định nghĩa route
Router::post('login', 'AuthController@login');
