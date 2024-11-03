<?php

class authController {

    public function GET () {
        print_r(jwtService::createToken('myusername'));
    }

    public function POST() {

    }
}