<?php

include_once 'Product.php';
session_start();
$product = new Product();
//$listOfProducts = $product->getAllProducts();
$product->addNewProduct();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add new product</title>
</head>
<body>
<div>
    <h1>Add a new product</h1>

    <form action="create.php" method='POST'>
        <div class="input-group">
            <label>Name</label>
            <input type="text" name="name" value="" required>
        </div>
        <div class="input-group">
            <label>Quantity</label>
            <input type="text" name="quantity" value="" required>
        </div>

        <div class="input-group">
            <label>Price</label>
            <input type="text" name="price" value="" required>
        </div>

        <input type="submit" name="submit" value="Submit" />

    </form>

</div>
</body>
</html>
