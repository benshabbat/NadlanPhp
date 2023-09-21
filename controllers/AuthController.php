<?php
include "./config/app.php";

class AuthController
{

    public $conn;
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
        $this->checkIsLoggedIn();
    }

    private function checkIsLoggedIn()
    {
        if (isset($_SESSION['authenticted'])) {
            redirect("you need to login", "login.php");
            return true;
        } else return false;
    }

    public function authUserDetail()
    {
        $checkAuth = $this->checkIsLoggedIn();
        if ($checkAuth) {
            $user_id = $_SESSION['authenticted']['user_id'];
            $getUserData = "SELECT * FROM users WHERE id = '$user_id' limit 1";
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
$authenticted = new AuthController;
