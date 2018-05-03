<?php

/**
 * Created by PhpStorm.
 * User: Frida
 * Date: 04-May-18
 * Time: 12:35 AM
 */
class DatabaseHandler
{
    public $host = "localhost";
    public $db_name = "crud";
    public $username = "root";
    public $password = "";

    public function connectToDatabase(){
        // Create connection
        $conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        return $conn;
    }
}