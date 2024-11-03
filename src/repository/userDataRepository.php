<?php

class userDataRepository extends databaseRepository {

    public function save($username, $password) {
        $sql = "
            INSERT INTO user_data (username, password)
            VALUES ('$username', '$password')
        ";

        $result = $this->conn->query($sql);

        if(!$result) {
            throw new Exception("Tạo bảng thất bại!");
        }
    }

    public function findByUsername($username) : userDataModel {
        $sql = "
            SELECT * FROM user_data
            WHERE username = '$username'
        ";

        $result = $this->conn->query($sql);

        if(!$result) {
            throw new Exception("Truy vấn thất bại");
        }

        $array = mysqli_fetch_array( $result, MYSQLI_ASSOC);

        if(!$array)
            throw new Exception("Không tìm thấy tên đăng nhập");

        return new userDataModel($array['id'], $array['username'], $array['password'], $array['role']);
    }
}