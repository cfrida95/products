<?php

include_once 'ProductOperations.php';
session_start();
$product = new ProductOperations();
$product->addNewProduct();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add new product</title>
    <style>
        .input {
            padding: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
<div style="margin: auto; text-align: center">
    <h1>Add a new product</h1>

    <form action="create.php" method='POST'>
        <div class="input">
            <label>Name</label>
            <input type="text" name="name" value="" required>
        </div>
        <div class="input">
            <label>Quantity</label>
            <input type="text" name="quantity" value="" required>
        </div>

        <div class="input">
            <label>Price</label>
            <input type="text" name="price" value="" required>
        </div>

        <input type="submit" name="submit" value="Submit"/>

    </form>

</div>
</body>
</html>
