<?php

class userDataDataBaseRepository extends databaseRepository {
    public function __construct() {
        $DB_NAME = envLoaderService::getEnv("userDB");

        $this->connect($DB_NAME);
    }
}