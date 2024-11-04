<?php

class abcdController extends authController {
    public function GET () {
        $this->responseJsonData("Gửi method thành công!");
    }
}