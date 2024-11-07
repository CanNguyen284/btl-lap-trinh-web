<?php

class userDataRepository extends userDataDataBaseRepository {

    public function save($username, $email, $password) {
        $sql = "
            INSERT INTO user_data (username, email, password)
            VALUES ('$username', '$email', '$password')
        ";

        $this->queryExecutor($sql);
    }

    public function findByUsername($username) : userDataModel {
        $sql = "
            SELECT * FROM user_data
            WHERE username = '$username'
        ";

        $array = $this->getDataFromResult($this->queryExecutor($sql));

        if($array == false)
            throw new Exception("không tìm thấy tên đăng nhập");

        return new userDataModel($array['id'], $array['username'], $array['password'], $array['role']);
    }

    public function updateEmailByUsername($username, $email) {
        $sql = "
            UPDATE user_data
            SET email = '$email'
            WHERE username = '$username'
        ";

        $this->queryExecutor($sql);
    }

    public function updatePasswordByUsername($username, $password) {
        $sql = "
            UPDATE user_data
            SET password = '$password'
            WHERE username = '$username'
        ";

        $this->queryExecutor($sql);
    }

    public function getIdByUsername($username) {
        $sql = "
            SELECT id FROM user_data
            WHERE username = '$username'
        ";

        return $this->getDataFromResult($this->queryExecutor($sql));
    }
}