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
            redirect("House add Success", "house-view.php");
        } else {
            redirect("Something went wrong", "house-add.php");
        }
    }

    public function houseDetails()
    {
        $username = $_SESSION['auth_user']['user_username'];
        $getHouseData = "SELECT * FROM houses";
        $result = mysqli_query($this->conn, $getHouseData);
        // $house = $result->fetch_assoc();
        if ($result) {
            return $result;
        }
    }
    public function houseDetailsById($id)
    {
        $getHouseData = "SELECT * FROM houses WHERE id ='$id' LIMIT 1";
        $result = mysqli_query($this->conn, $getHouseData);
        $house = $result->fetch_assoc();
        if ($house) {
            return $house;
        }
    }

    public function edit($id)
    {
        return $this->houseDetailsById($id);
    }

    public function update($inputData, $id)
    {

        $houseUpdateQuery = "UPDATE houses SET property_type='$inputData[property_type]',city='$inputData[city]'
        ,address='$inputData[address]' ,floor='$inputData[floor]',
        description='$inputData[description]',price='$inputData[price]',rooms='$inputData[rooms]'
        ,sqm='$inputData[sqm]',perks='$inputData[perks]',images='$inputData[images]'
         WHERE id = '$id' limit 1";
        $result = mysqli_query($this->conn, $houseUpdateQuery);
        if ($result) {
            redirect("House updated Success", "house-view.php");
        } else {
            redirect("Something went wrong", "house-view.php");
        }
    }
}
