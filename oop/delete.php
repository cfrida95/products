<?php
//including the database connection file
include("Product.php");

$product = new Product();
$product->deleteProduct();
