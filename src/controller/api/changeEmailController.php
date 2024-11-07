<?php

class changeEmailController extends apiController {
    public function PUT() {
        $email = $this->requestBody['email'];

        $this->userdataRepository->updateEmailByUsername($_SESSION['username'], $email);

        $this->responseJsonData("Đổi email thành công!");
    }
}