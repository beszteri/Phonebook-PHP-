<?php
class DB {
    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPassword = "";
    private $dbName = "testdb";
    private $conn;

    public function __construct() {
        try {
            $dsn = "mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName;
            $this->conn = new PDO($dsn, $this->dbUser, $this->dbPassword);
            echo "Database Connection Successful";
        }catch(PDOException $e) {
            die("DB Connection Failed" . $e->getMessage());
        }
    }
}