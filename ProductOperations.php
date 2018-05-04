<?php

include 'DatabaseHandler.php';

class ProductOperations
{
    /**
     * Function for listing all the products retrieved from the database
     * @return bool|mysqli_result
     */
    public function getAllProducts()
    {
        $connection = new DatabaseHandler();
        $conn = $connection->connectToDatabase();

        $sql = "SELECT * FROM products";
        $results = mysqli_query($conn, $sql);

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

    /**
     * Function for adding a new product in the database
     */
    public function addNewProduct()
    {
        $connection = new DatabaseHandler();
        $conn = $connection->connectToDatabase();

        if (isset($_POST['submit'])) {
            $name = $this->test_input($_POST['name']);
            $quantity = $this->test_input($_POST['quantity']);
            $price = $this->test_input($_POST['price']);

            //Insert the data into the database
            $sql = "INSERT INTO products (name, quantity, price) VALUES ('$name', '$quantity', '$price')";

            if (mysqli_query($conn, $sql)) {
                $_SESSION['message'] = "Record added successfully.";
                header('Location: products_list.php');
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                exit();
            }

            // Close connection
            mysqli_close($conn);
        }
    }

    public function read()
    {
        $connection = new DatabaseHandler();
        $conn = $connection->connectToDatabase();

        if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {

            $id = $_GET['id'];

            //Selecting the particular product
            $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");

            while ($res = mysqli_fetch_array($result)) {
                $name = $res['name'];
                $quantity = $res['quantity'];
                $price = $res['price'];
            }

            mysqli_close($conn);

        }
        return array($name, $quantity, $price);
    }


    /**
     * Updating a product in the database
     * @return array|bool|mysqli_result
     */
    public function editProduct()
    {
        $connection = new DatabaseHandler();
        $conn = $connection->connectToDatabase();

        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];

            //Updating the table
            $result = mysqli_query($conn, "UPDATE products SET name='$name',quantity='$quantity',price='$price' WHERE id=$id");

            $_SESSION['message'] = "Record updated successfully";
            //Redirect to homepage
            header('Location: products_list.php');
            return $result;

        }

        if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {

            $id = $_GET['id'];

            //Selecting the particular product
            $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");

            while ($res = mysqli_fetch_array($result)) {
                $name = $res['name'];
                $quantity = $res['quantity'];
                $price = $res['price'];
            }

            return array($name, $quantity, $price);

        }

    }

    /**
     * Delete a product
     */
    public function deleteProduct()
    {
        $connection = new DatabaseHandler();
        $conn = $connection->connectToDatabase();

        //Retrieve the product's id
        $id = $_GET['id'];

        //Deleting the row from table
        mysqli_query($conn, "DELETE FROM products WHERE id=$id");
        mysqli_close($conn);

        $_SESSION['message'] = "Record deleted successfully.";
        header('Location: products_list.php');

    }
}