<?php

class HouseController
{
    public $conn;

    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function create($inputData)
    {

        $data = "' " . implode("','", $inputData) . " '";
        echo $data;


        $sql = "INSERT INTO houses (username,property_type,city,address,floor,description,price,rooms,sqm,perks,images)
        VALUES (  $data )";

        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function houseDetail()
    {
        $username = $_SESSION['auth_user']['user_username'];
        $getHouseData = "SELECT * FROM houses";
        $result = mysqli_query($this->conn, $getHouseData);
        // $house = $result->fetch_assoc();
        if ($result) {
            return $result;
        }
    }
}
