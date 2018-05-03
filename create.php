<?php

//Including the database connection file
include_once 'database_config.php';

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$name = '';
$quantity = '';
$price = '';

if (isset($_POST['submit'])) {
    $name = test_input($_POST['name']);
    $quantity = test_input($_POST['quantity']);
    $price = test_input($_POST['price']);

    // attempt insert query execution
    $sql = "INSERT INTO products (name, quantity, price) VALUES ('$name', '$quantity', '$price')";
    if (mysqli_query($conn, $sql)) {
        echo "Record added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    // close connection
    mysqli_close($conn);

}
