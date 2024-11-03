<?php

class loginController extends authController {
    public function PUT () {
        $userData = $this->userdataRepository->findByUsername($this->requestBody['username']);

        if($userData->getPasswd() == $this->requestBody['password']) {
            $this->setCookieToken($this->requestBody['username']);

            $this->responseJsonData("Đăng nhập thành công!");
        }

        $this->responseJsonData("Sai mật khẩu", 401);;
    }
}