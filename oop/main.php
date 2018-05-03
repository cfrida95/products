<?php
/**
 * Created by PhpStorm.
 * User: Frida
 * Date: 04-May-18
 * Time: 12:34 AM
 */
include 'Product.php';


$product_collection = new Product();
echo $product_collection->getAllProducts();