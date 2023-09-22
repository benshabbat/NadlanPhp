<?php

class HouseController{
    public $conn;

    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn =$db->conn;
    }

    public function create($inputData){

        $data = "' ".implode("','",$inputData)." '";

        $sql = "INSERT INTO houses (username,property_type,city,address, floor, description,price,rooms, sqm, perks, images)
        VALUES ($data)";
        $result = $this->conn->query($sql);
        return $result;

    }
}
