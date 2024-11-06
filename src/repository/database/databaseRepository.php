<?php

use Exception;
use mysqli;

class databaseRepository {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    protected $conn;

    protected function connect($DB_NAME) {
        $this->servername = envLoaderService::getEnv("IP");
        $this->username = envLoaderService::getEnv("USER");
        $this->password = envLoaderService::getEnv("PASSWD");
        $this->dbname = $DB_NAME;

        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            throw new Exception("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function __construct() {

    }
}