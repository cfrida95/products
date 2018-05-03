<?php
/**
 * Created by PhpStorm.
 * User: Frida
 * Date: 03-May-18
 * Time: 10:57 PM
 */

//including the database connection file
include("database_config.php");

$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($conn, "DELETE FROM products WHERE id=$id");

//Redirect to homepage
header('Location: index.html');