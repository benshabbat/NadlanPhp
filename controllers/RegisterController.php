<?php
include "./config/app.php";

class RegisterController
{
    public $conn;

    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn =$db->conn;
    }

    public function registration($username, $email, $phone, $password){
        $register_query = "INSERT INTO users (username, email, phone, password) VALUES ('$username', '$email','$phone', ' $password')";
    }
}

?>