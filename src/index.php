<?php

namespace YourNamespace;

class HelloWorld {
    public function sayHello() {
        return "Hello, World!";
    }
}

// Sử dụng autoload của Composer
require '../vendor/autoload.php';

// Tạo đối tượng và gọi phương thức
$hello = new HelloWorld();
echo $hello->sayHello();
