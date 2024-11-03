<?php

class registerController extends authController {

    public function POST() {
        $this->userdataRepository->existByUsername($this->requestBody['username']);
        $this->userdataRepository->existByEmail($this->requestBody['email']);

        $this->setCookieToken($this->requestBody['username']);
        $this->userdataRepository->save($this->requestBody['username'], $this->requestBody['email'], $this->requestBody['password']);

        $this->responseJsonData("Đăng kí tài khoản thành công");
    }
}