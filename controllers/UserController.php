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
        $getHouseData = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($this->conn, $getHouseData);
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

   
    }

    public function delete($id)
    {

    }
}
