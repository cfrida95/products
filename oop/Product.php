<?php

include 'DatabaseHandler.php';

class Product
{
    public function getAllProducts(){
        $connection = new DatabaseHandler();
        $conn = $connection->connectToDatabase();

        $sql = "SELECT * FROM products";
        $results = mysqli_query($conn, $sql);
        
//        print_r($results);
        mysqli_close($conn);
        return $results;
    }

    /**
     * Function for validating the input data.
     * @param $data
     * @return string
     */
    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function addNewProduct(){
        $connection = new DatabaseHandler();
        $conn = $connection->connectToDatabase();

        if (isset($_POST['submit'])) {
            $name = $this->test_input($_POST['name']);
            $quantity = $this->test_input($_POST['quantity']);
            $price = $this->test_input($_POST['price']);

            // attempt insert query execution
            $sql = "INSERT INTO products (name, quantity, price) VALUES ('$name', '$quantity', '$price')";
            if (mysqli_query($conn, $sql)) {
                $_SESSION['message'] = "Record added successfully.";
                header('Location: index.php');
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                exit();
            }

            // close connection
            mysqli_close($conn);
        }
    }
    


    public function editProduct(){
        $connection = new DatabaseHandler();
        $conn = $connection->connectToDatabase();
        
        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];

            //updating the table
            $result = mysqli_query($conn, "UPDATE products SET name='$name',quantity='$quantity',price='$price' WHERE id=$id");

            $_SESSION['message'] = "Record updated successfully".
            //Redirect to homepage
            header('Location: index.php');
            return $result;

        }

        if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {

            $id = $_GET['id'];

            //selecting data associated with this particular id
            $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");

            while ($res = mysqli_fetch_array($result)) {
                $name = $res['name'];
                $quantity = $res['quantity'];
                $price = $res['price'];
            }

            return array($name,$quantity,$price);
            
        }
        
    }

    public function deleteProduct(){
        $connection = new DatabaseHandler();
        $conn = $connection->connectToDatabase();


        $id = $_GET['id'];

        //deleting the row from table
        $result = mysqli_query($conn, "DELETE FROM products WHERE id=$id");
        $_SESSION['message'] = "Record deleted successfully.";
        header('Location: index.php');
        
    }
}