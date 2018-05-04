<?php
include_once 'ProductOperations.php';

session_start();

$product = new ProductOperations();
$viewProduct = $product->read();

//The function returns an array with 3 values (name,quantity,price)
$name = $viewProduct[0];
$quantity = $viewProduct[1];
$price = $viewProduct[2];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>

    <style type="text/css">
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <h1>View Record no.<?php echo $_GET['id']; ?> </h1>

    <p> Name : <?php echo $name; ?></p>
    <p> Quantity: <?php echo $quantity; ?></p>
    <p>Price : <?php echo $price; ?></p>

    <p><a href="products_list.php" class="btn">Back</a></p>

</div>
</body>
</html>