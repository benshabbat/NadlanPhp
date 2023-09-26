<?php

class LoginController
{

    public $conn;

    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function userLogin($username, string $password)
    {
        $login_query = "SELECT * FROM users WHERE username='$username' and password='$password' LIMIT 1";
        $result = mysqli_query($this->conn, $login_query);
        $user = $result->fetch_assoc();
        if ($user) {
            $this->userAuth($user);
            redirect("Logged in Succesfully", "index.php");
        } else {
            redirect("Invalid Username Or Password", "login.php");
        }
    }


    private function userAuth($data)
    {
        $_SESSION['authenticated'] = true;
        $_SESSION['auth_user'] = [
            "user_id" => $data["id"],
            "user_username" => $data["username"],
            "user_email" => $data["email"],
            "user_phone" => $data["phone"],

        ];
    }


    public function isLoggedIn()
    {
        if (isset($_SESSION['authenticated'])) {
            redirect("Already logged in", "index.php");
        } else {
            return false;
        }
    }
    public function logout()
    {
        if (isset($_SESSION['authenticated'])) {
            unset($_SESSION['authenticated']);
            unset($_SESSION['auth_user']);
            redirect("Logged out Succesfully", "login.php");
        } 
    }
}
