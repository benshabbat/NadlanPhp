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
    public function houseDetailsForOprtionsPrice()
    {
        $getHouseData = "SELECT DISTINCT `price` FROM `houses` ORDER BY `houses`.`price` ASC";
        $result = mysqli_query($this->conn, $getHouseData);
        if ($result) {
            return $result;
        }
    }
    public function houseDetailsForOprtions($type)
    {
        $getHouseData = "SELECT DISTINCT `$type` FROM `houses` ORDER BY `houses`.`$type` ASC";
        
        $result = mysqli_query($this->conn, $getHouseData);
        if ($result) {
            return $result;
        }
    }
    public function houseDetailsForOprtionsRooms()
    {
        $getHouseData = "SELECT DISTINCT `rooms` FROM `houses` ORDER BY `houses`.`rooms` ASC";
        
        $result = mysqli_query($this->conn, $getHouseData);
        if ($result) {
            return $result;
        }
    }
    
    public function getPerks()
    {
        $getPerks = "SELECT * FROM perks";
        $result = mysqli_query($this->conn, $getPerks);
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

    public function filterTable($query)
    {
        $result = mysqli_query($this->conn, $query);
        $result = mysqli_fetch_array($result);
        $finalArr= [];
        foreach($result as $list){
            $finalArr[]=$list;
        }
        $newResult = array_unique($finalArr);
        return $newResult;
    }
    public function searchAll($city, $rooms, $valueToSearch, $property)
    {
        // $query = " SELECT * FROM `houses` WHERE CONCAT (`username`, `images`, `address`, `sqm`, `floor`, `price`,`property_type`)
        // LIKE '%" . $valueToSearch . "%' AND city ='$city' AND rooms ='$rooms' AND property_type ='$property'";
        $query = " SELECT * FROM `houses`";

        if ($city || $rooms || $valueToSearch || $property) {
            $result = mysqli_query($this->conn, $query);
            foreach ($result as $row) {
                if ($row['city'] == $city || $row['rooms'] == $rooms || $row['property_tpe'] == $property)
                    return $result;
            }
        } else {

            return $this->houseDetails();
        }
    }
    public function searchValue($valueToSearch)
    {
        $query = " SELECT * FROM `houses` WHERE CONCAT (`username`,`city`, `images`, `address`, `sqm`, `rooms`, `floor`, `price`,`property_type`) LIKE '%" . $valueToSearch . "%' ";
        return mysqli_query($this->conn, $query);
    }
    public function searchCity($city)
    {
        $query = " SELECT * FROM `houses` WHERE city ='$city' ";
        return mysqli_query($this->conn, $query);
    }
    public function searchRooms($rooms)
    {
        $query = " SELECT * FROM `houses` WHERE rooms ='$rooms' ";
        return mysqli_query($this->conn, $query);
    }
    public function searchProperty($property)
    {
        $query = " SELECT * FROM `houses` WHERE property_type ='$property' ";
        return mysqli_query($this->conn, $query);
    }

    public function search($property, $city, $rooms, $valueToSearch)
    {
        if ($valueToSearch) {
            return $this->searchValue($valueToSearch);
        }
        if ($property) {
            return  $this->searchProperty($property);
        }
        if ($rooms) {
            return $this->searchRooms($rooms);
        }
        if ($city) {
            return $this->searchCity($city);
        } else {
            return $this->houseDetails();
        }
    }
}
