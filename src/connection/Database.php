<?php
class Database {
    private $host = "localhost";     // Your host
    private $db_name = "sdao";     // Your database name
    private $username = "root";  // Your database username
    private $password = "";  // Your database password
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            // Creating a PDO connection
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }

    public function prepare($sql) {
        return $this->conn->prepare($sql);
    }

    // Optional: You could add additional helper methods here
}
?>
