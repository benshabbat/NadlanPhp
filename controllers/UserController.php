<?php

class UserController
{
    public $conn;

    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function userDetailsByUsername(string $username)
    {
        $getUserData = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($this->conn, $getUserData);
        $user = $result->fetch_assoc();
        if ($user) {
            return $user;
        }
    }
    public function userDetails()
    {
        $getUserData = "SELECT * FROM users";
        $result = mysqli_query($this->conn, $getUserData);
        $user = $result->fetch_assoc();
        if ($user) {
            return $user;
        }
    }
    public function userDetailsById($id)
    {
        $getHouseData = "SELECT * FROM users WHERE id ='$id' LIMIT 1";
        $result = mysqli_query($this->conn, $getHouseData);
        $user = $result->fetch_assoc();
        if ($user) {
            return $user;
        }
    }

    public function edit($id)
    {
        return $this->userDetailsById($id);
    }

    public function update($inputData, $id)
    {
        $phone = $this->templatePhone($inputData['phone']);
        $userUpdateQuery = "UPDATE users SET username='$inputData[username]',email='$inputData[email]'
        ,phone='$phone' WHERE id = '$id' limit 1";
        $result = mysqli_query($this->conn, $userUpdateQuery);
        if ($result) {
            redirect("User updated Success", "house-view.php");
        } else {
            redirect("Something went wrong", "house-view.php");
        }
    }

    public function delete($id)
    {
    }
    public function templatePhone($phone)
    {
        if (strlen($phone) == 10)
            $str = substr($phone, 0, 3) . "-" . substr($phone, 3, 7);
        return $str;
    }
}
