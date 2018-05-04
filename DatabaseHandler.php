<?php

class DatabaseHandler
{
    private $host = "localhost";
    private $db_name = "crud";
    private $username = "root";
    private $password = "";

    public function connectToDatabase()
    {
        // Create connection
        $conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
}