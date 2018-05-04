<?php
include_once 'Product.php';
session_start();
$product = new Product();
$editProduct = $product->editProduct();
//print_r($editProduct);

//The function returns an array with 3 values (name,quantity,price)
$name = $editProduct[0];
$quantity = $editProduct[1];
$price = $editProduct[2];

?>

<html>
<head>
    <title>Edit</title>
</head>

<body>

<h1>Update product</h1>

<form name="form1" method="post" action="edit.php">
    <table border="0">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo $name ?>"></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><input type="text" name="quantity" value="<?php echo $quantity; ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="price" value="<?php echo $price; ?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>

<a href="../index.html">Home</a>
</body>
</html>
