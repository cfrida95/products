<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
//$link = mysqli_connect("localhost", "root", "",'crud');
//
//// Check connection
//if($link === false){
//    die("ERROR: Could not connect. " . mysqli_connect_error());
//}
//
//// Print host information
//echo "Connect Successfully. Host info: " . mysqli_get_host_info($link);


//// Print host information
//echo "Connect Successfully. Host info: ";
//

$host = "localhost";
$db_name = "crud";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($host, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$sql = "SELECT id, name, price FROM products";
//$result = $conn->query($sql);
//
//if ($result->num_rows > 0) {
//    // output data of each row
//    while($row = $result->fetch_assoc()) {
//        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["price"]. "<br>";
//    }
//} else {
//    echo "0 results";
//}
//$conn->close();