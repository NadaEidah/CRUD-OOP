<?php

class Database
{
    private $host = "localhost";
    private $db_name = "My_application";
    private $username = "root";
    private $password = "17M*71mr";

    public $conn;

    public function create_connection()
    {
        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ";dbname=" . $this->db_name,
                $this->username, $this->password);
            echo "connected successfully";

        }
        catch (PDOException $exception) {
            echo "coneation error" . $exception->getMessage();

        }
        return $this->conn;
    }
}

?>