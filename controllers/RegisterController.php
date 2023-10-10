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
        $phone=$this->templatePhone($phone);
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
        $checkUser = "SELECT username FROM users WHERE username= '$username' ";
        $result = $this->conn->query($checkUser);
        if($result){
            redirect("Already User is Exist", "register.php");
        }
        else{
            return false;
        }

    }
    public function isEmailExist($email){
        $checkUser = "SELECT email FROM users WHERE email= '$email' ";
        $result = $this->conn->query($checkUser);
        if($result){
            redirect("Already Email is Exist", "register.php");
        }
        else{
            return false;
        }

    }
    public function templatePhone($phone)
    {
    if (strlen($phone) == 10)
        $str = substr($phone, 0, 3) . "-" . substr($phone, 3, 7);
    return $str;
    } 
}
