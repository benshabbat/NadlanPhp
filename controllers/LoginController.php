<?php

class LoginController
{

    public $conn;

    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function userLogin($username, $password)
    {
        $login_query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $this->conn->query($login_query);
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $this->userAuth($data);
            return true;
        } else {
            return false;
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
}
