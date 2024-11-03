<?php

class apiController extends versionController {
    protected $username;

    public function middleware() {
        $token = $_COOKIE['token'] ?? null;

        if($token == null)
            $this->responseJsonData("Api yêu cầu đăng nhập", 401);


        $decoded = jwtService::validateToken($_COOKIE['token']);

        $this->username = $decoded->sub;
    }
}