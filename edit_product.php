<?php
// including the database connection file
include_once("database_config.php");

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    //updating the table
    $result = mysqli_query($conn, "UPDATE products SET name='$name',quantity='$quantity',price='$price' WHERE id=$id");

    echo "Record updated successfully.";

}

if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {

    $id = $_GET['id'];

    //selecting data associated with this particular id
    $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");

    while ($res = mysqli_fetch_array($result)) {
        $name = $res['name'];
        $quantity = $res['quantity'];
        $price = $res['price'];
    }
}

?>


<html>
<head>
    <title>Edit</title>
</head>

<body>

<h1>Update product</h1>

<form name="form1" method="post" action="edit_product.php">
    <table border="0">
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
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

<a href="index.html">Home</a>
</body>
</html>
