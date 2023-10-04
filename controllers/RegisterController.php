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
        $phone=addstrPhone($phone);
        $register_query = "INSERT INTO users (username, email, phone, password) 
        VALUES ('$username', '$email','$phone', '$password')";
        $result = mysqli_query($this->conn, $register_query);
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
    public function addstrPhone($str)
    {
    if (strlen($str) == 10)
        $str = substr($str, 0, 3) . "-" . substr($str, 3, 7);
    return $str;
    } 
}
