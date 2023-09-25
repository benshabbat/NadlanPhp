<?php
session_start();
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'nadlandb');
include_once "./config/DatabaseConnection.php";
$db = new DatabaseConnection;
include "./code/auth.php";
include "./code/house.php";

// function validateInput($input)
// {
//     $db = new DatabaseConnection;
//     return mysqli_real_escape_string($db->conn, $input);
// }

function redirect($message, $page)
{

    $_SESSION['message'] = $message;
    header("location:$page");
    exit(0);
}
