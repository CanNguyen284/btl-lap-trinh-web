<?php

class managerController extends apiController {
    public function __construct() {
        parent::__construct();

        $user = $this->userdataRepository->findByUsername($_SESSION['username']);

        print_r($user);
    }

    public function GET() {

    }
}