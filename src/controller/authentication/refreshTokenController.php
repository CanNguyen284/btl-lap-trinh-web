<?php

use Firebase\JWT\ExpiredException;

class refreshTokenController extends authController {

    public function GET() {
        try {
            $token = $_COOKIE['token'];
            jwtService::validateToken($token);

            $this->responseJsonData("Token chưa hết hạn.", 403);
        } catch (ExpiredException $e) {
            $username =  $e->getPayload()->sub;

            $this->setCookieToken($token);
            $this->responseJsonData("Yêu cầu refreshToken thành công!");
        }
    }
}