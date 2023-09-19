<?php
class RegisterController
{
    public $conn;

    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn =$db->conn;
    }

    public function registration($username, $email, $phone, $password){
        $register_query = "INSERT INTO users (username, email, phone, password) 
        VALUES ('$username', '$email','$phone', ' $password')";
        $result = $this->conn->query($register_query);
        return $result;

    }

    public function isUserExist($email){
        $checkUser = "SELECT email FROM users WHERE email= '$email' LIMIT 1 ";
        $result = $this->conn->query($checkUser);
        if($result->num_rows > 0){
            return true;
        }
        else{
            return false;
        }

    }
}
