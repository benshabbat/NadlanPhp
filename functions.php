<?php
session_start();

include "./config/DatabaseConnection.php";

function validate($inputData)
{
    global $conn;
    $validateData = mysqli_real_escape_string($conn, $inputData);
    return trim($validateData);
}


function redirect($message, $page)
{

    $_SESSION['message'] = $message;
    header("location:$page");
    exit(0);
}


function insert($tableName, $data)
{
    global $conn;

    $table = validate($tableName);

    $columns = array_keys($data);
    $values = array_values($data);
    $columns = implode(",", $columns);
    $values  = "'" . implode("','", $values) . "'";

    $query = "INSERT INTO $table ($columns)VALUES ($values)";
    $result = mysqli_query($conn, $query);
    return $result;
}
