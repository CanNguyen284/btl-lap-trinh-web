<?php

class databaseRepository {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    protected $conn;

    public function __construct() {
        $this->servername = envLoaderService::getEnv("IP");
        $this->username = envLoaderService::getEnv("USER");
        $this->password = envLoaderService::getEnv("PASSWD");
        $this->dbname = envLoaderService::getEnv("DB_NAME");

        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            throw new Exception("Connection failed: " . $this->conn->connect_error);
        }
    }
}