<?php

class Controller {
    protected function requestBody () {
        $inputData = file_get_contents('php://input');
        $data = json_decode($inputData, true);

        return $data;
    }

    protected function responseJsonData($message, $code = 200) {
        http_response_code($code);

        $responseData = [
                'date' => date('Y-m-d H:i:s'),
                'code' => $code,
                'message' => $message,
                'path' => $_SERVER["REQUEST_URI"]
        ];

        echo json_encode($responseData);

        exit;
    }

    public function __construct() {

    }
}