<?php

//table(name = "user_data")
class userDataModel {
    private int $id;
    private string $username;
    private string $password;
    private string | null $role;

    public function __construct($id, $username, $password, $role) {
        $this->username = $username;
        $this->password = $password;
        $this->id = $id;
        $this->role = $role;
    }

    public function getPasswd() {
        return $this->password;
    }
}