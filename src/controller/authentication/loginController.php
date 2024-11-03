<?php

class loginController {
    public function PUT () {
        $inputData = file_get_contents('php://input');
        $data = json_decode($inputData, true);

        if($data == null) {
            throw new Exception("Không tìm thấy dữ liệu trong body");
        }

        $e = new userDataRepository();

        $userData = $e->findByUsername($data['username']);

        if($userData->getPasswd() == $data['password']) {
            $token = jwtService::createToken($data['username']);

            setcookie('token', $token, time() + 3600, "/");

            $responseData = [
                'date' => date('Y-m-d H:i:s'),
                'code' => "200",
                'message' => "Đăng nhập thành công",
                'path' => $_SERVER["REQUEST_URI"]
            ];

            echo json_encode($responseData);

            return;
        }

        throw new Exception("Sai mật khẩu");
    }
}