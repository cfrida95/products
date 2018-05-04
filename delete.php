<?php
//including the database connection file
include("ProductOperations.php");
session_start();

$product = new ProductOperations();
$product->deleteProduct();
