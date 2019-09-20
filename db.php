<?php
class DB {
    private $dbHost = "localhost";
    private $dbUser = "root";
    private $dbPassword = "";
    private $dbName = "namesdb";
    private $conn;

    public function __construct() {
        try {
            $dsn = "mysql:host=" . $this->dbHost . ";dbname=" . $this->dbName;
            $this->conn = new PDO($dsn, $this->dbUser, $this->dbPassword);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            die("DB Connection Failed" . $e->getMessage());
        }
    }

    public function insertData($name, $phonenumber) {
        $sql = "INSERT INTO names (name, phonenumber) VALUES (:name, :phonenumber)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['name' => $name, 'phonenumber' => $phonenumber]);
        echo "Data inserted";
    }

    public function getData() {
        $sql = "SELECT * FROM names";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function deleteData($id) {
        $sql = "DELETE FROM names WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        echo "ID: " . $id . " was deleted";
    }

    public function editData($id, $phonenumber) {
        $sql = "UPDATE names SET phonenumber = :phonenumber where id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id, 'phonenumber' => $phonenumber]);
    }

    public function searchData($name) {
        $sql = "SELECT * FROM names WHERE name LIKE :name";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['name' => '%' .  $name . '%']);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}