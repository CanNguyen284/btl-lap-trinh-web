<?php

class apiController extends Controller {
    protected userDataRepository $userdataRepository;
    protected userInfoRepository $userInfoRepository;

    public function __construct() {
        parent::__construct();
        $this->userInfoRepository = new userInfoRepository();
        $this->userdataRepository = new userDataRepository();

        $token = $_COOKIE['token'] ?? null;

        if($token == null)
            $this->responseJsonData("Api yêu cầu đăng nhập", 401);

        $decoded = jwtService::validateToken($_COOKIE['token']);

        $_SESSION['username'] = $decoded->sub;
    }
}