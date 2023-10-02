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

        $data = "'" . implode("','", $inputData) . "'";
        echo $data;


        $sql = "INSERT INTO houses (username,property_type,city,address,floor,description,price,rooms,sqm,perks,images)
        VALUES ($data)";

        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            redirect("House add Success", "house-view.php");
        } else {
            redirect("Something went wrong", "house-add.php");
        }
    }

    public function houseDetails()
    {
        $getHouseData = "SELECT * FROM houses";
        $result = mysqli_query($this->conn, $getHouseData);
        // $house = $result->fetch_assoc();
        if ($result) {
            return $result;
        }
    }
    public function houseDetailsByUsername(string $username)
    {
        // $username = $_SESSION['auth_user']['user_username'];
        $getHouseData = "SELECT * FROM houses WHERE username = '$username'";
        $result = mysqli_query($this->conn, $getHouseData);
        $house = $result->fetch_assoc();
        if ($house) {
            return $house;
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

    public function delete($id)
    {
        $houseDeleteQuery = "DELETE FROM houses WHERE id = '$id' limit 1";
        $result = mysqli_query($this->conn, $houseDeleteQuery);
        if ($result) {
            redirect("House Deleted Success", "house-view.php");
        } else {
            redirect("Something went wrong", "house-view.php");
        }
    }

    public function searchType($valueToSearch)
    {

        if ($valueToSearch) // search cars
        {
            $valueToSearch = $_POST['valueToSearch'];
            $query = " SELECT * FROM `houses` WHERE CONCAT (`username`,`city`, `typecar`, `images`, `address`, `sqm`, `rooms`, `floor`, `price`,`property_type`) LIKE '%" . $valueToSearch . "%' ";
        } else {
            $query = " SELECT * FROM `houses`";
        }
        return mysqli_query($this->conn, $query);
    }
    public function filterTable($query)
    {
         return mysqli_query($this->conn, $query);
        // return $result->fetch_assoc();
    }
}
