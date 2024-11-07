<?php

class authController extends Controller {
    protected userDataRepository $userdataRepository;
    protected $requestBody;

    public function __construct() {
        $this->userdataRepository = new userDataRepository();
        $this->requestBody = $this->requestBody();
    }

    protected function setCookieToken($username) {
        $token = jwtService::createToken($username);

        setcookie('token', $token, time() + 3600, "/");

        return $token;
    }

    //authcontroller không có method cụ thể
}