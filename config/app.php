<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'nadlandb');
include_once "./config/DatabaseConnection.php";
$db = new DatabaseConnection;
