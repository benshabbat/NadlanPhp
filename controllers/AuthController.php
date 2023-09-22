<?php
// include "./config/app.php";

class AuthController
{

    private $conn;
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
        $this->checkIsLoggedIn();
    }

    private function checkIsLoggedIn()
    {
        if (!isset($_SESSION['authenticated'])) {
            redirect("you need to login", "login.php");
            return false;
        } else {
            return true;
        }
    }

    public function authUserDetail()
    {
        $checkAuth = $this->checkIsLoggedIn();
        if ($checkAuth) {
            $user_id = $_SESSION['auth_user']['user_id'];
            $getUserData = "SELECT * FROM users WHERE id = '$user_id' LIMIT 1";
            $result = mysqli_query($this->conn, $getUserData);
            $user = $result->fetch_assoc();
            if ($user) {
                return $user;
            } else {
                redirect("something went wrong", "login.php");
            }
        } else {
            return false;
        }
    }
}

