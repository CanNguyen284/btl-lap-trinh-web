<?php

class userInfoRepository extends userDataDataBaseRepository {
    public function save($id, $displayName) {
        $sql = "
            INSERT INTO user_info (user_id, display_name)
            VALUES ('$id', '$displayName')
        ";

        $this->queryExecutor($sql);
    }

    public function updateDisplayName($id, $displayName) {
        $sql = "
            UPDATE user_info
            SET display_name = '$displayName'
            WHERE user_id = '$id'
        ";

        $this->queryExecutor($sql);
    }

    public function existById($id) {
        $sql = "
            SELECT * FROM user_info
            WHERE user_id = '$id'
        ";

        $result = $this->getDataFromResult($this->queryExecutor($sql));

        return $result;
    }
}