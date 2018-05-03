<?php

/**
 * Created by PhpStorm.
 * User: Frida
 * Date: 04-May-18
 * Time: 12:34 AM
 */

include 'DatabaseHandler.php';

class Product
{
    public function getAllProducts(){
        $connection = new DatabaseHandler();
        $conn = $connection->connectToDatabase();

        $sql = "SELECT * FROM products";
        $results = mysqli_query($conn, $sql);
        
//        print_r($results);
        return $results;
    }

    public function addNewProduct(){
        $connection = new DatabaseHandler();
        $conn = $connection->connectToDatabase();
    }

    public function editProduct(){
        $connection = new DatabaseHandler();
        $conn = $connection->connectToDatabase();
    }

    public function deleteProduct(){
        $connection = new DatabaseHandler();
        $conn = $connection->connectToDatabase();
    }
}