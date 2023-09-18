<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'nadlandb');

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

// $db_server = "localhost";
// $db_user = "root";
// $db_pass = "";
// $db_name = "nadlandb";
// try {
//     $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
// } catch (mysqli_sql_exception) {
//     echo "you are not connected";
// }

?>

