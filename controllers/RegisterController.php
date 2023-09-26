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
        VALUES ('$username', '$email','$phone', '$password')";
        $result = $this->conn->query($register_query);
        if ($result) {
            redirect("Register Succesfully", "login.php");
        } else {
            redirect("Register Faild", "register.php");
        }

    }

    public function isUserExist($username){
        $checkUser = "SELECT username FROM users WHERE username= '$username' LIMIT 1 ";
        $result = $this->conn->query($checkUser);
        if($result->num_rows > 0){
            redirect("Already User is Exist", "register.php");
        }
        else{
            return false;
        }

    }
    public function isEmailExist($email){
        $checkUser = "SELECT email FROM users WHERE email= '$email' LIMIT 1 ";
        $result = $this->conn->query($checkUser);
        if($result->num_rows > 0){
            redirect("Already Email is Exist", "register.php");
        }
        else{
            return false;
        }

    }
}
