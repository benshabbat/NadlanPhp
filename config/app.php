<?php
// session_start();
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'nadlandb');
include_once "./config/DatabaseConnection.php";
$db = new DatabaseConnection;
include "./code/auth.php";

// function validateInput($dbconn,$input){
//     return mysqli_real_escape_string($dbconn,$input);}

function redirect($message,$page){

    $_SESSION['message'] = $message;
    header("location:$page");
    exit(0);

}
