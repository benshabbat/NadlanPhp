<?php
include_once "./controllers/HouseController.php";
include "./inc/upload.php";
$house = new HouseController;
$username = "";
$property_type = filter_input(INPUT_POST, "property_type", FILTER_SANITIZE_SPECIAL_CHARS);
$city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_SPECIAL_CHARS);
$address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
$floor = filter_input(INPUT_POST, "floor", FILTER_SANITIZE_NUMBER_INT);
$description =  filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
$price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_INT);
$rooms = filter_input(INPUT_POST, "rooms", FILTER_SANITIZE_NUMBER_INT);
$sqm = filter_input(INPUT_POST, "sqm", FILTER_SANITIZE_NUMBER_INT);
$perks = [];
$valueToSearch=filter_input(INPUT_POST, "valueToSearch", FILTER_SANITIZE_SPECIAL_CHARS);
$property= filter_input(INPUT_POST, "property", FILTER_SANITIZE_SPECIAL_CHARS);
$maxPrice=99999999;
$minPrice=0;
$inputData = [
    'username' => $username,
    'property_type' => $property_type,
    'city' => $city,
    'address' => $address,
    'floor' => $floor,
    'description' => $description,
    'price' => $price,
    'rooms' => $rooms,
    'sqm' => $sqm,
    'perks' => $perks,
    'images' => $images,

];
if (isset($_POST['house_update_btn'])) {
    $id = $_POST['id'];
    $perks = $_POST['perks'];
    $inputData['perks'] = implode(',', $perks);
    $inputData['username'] = $_SESSION['auth_user']["user_username"];
    $house->update($inputData, $id);
}

if (isset($_POST['house_delete_btn'])) {
    $id = $_POST['house_delete_btn'];
    $house->delete($id);
}

if (isset($_POST['search'])) // search houses
{
    $valueToSearch = $_POST['valueToSearch']? $_POST['valueToSearch'] : false;
    $city = isset($_POST['cityOption']) ? $_POST['cityOption'] : false;
    $rooms = isset($_POST['number_rooms']) ? $_POST['number_rooms'] : false;
    $property = isset($_POST['property'])? $_POST['property'] : false;
    $minPrice = $_POST['minPrice']? $_POST['minPrice'] : 0;
    $maxPrice = $_POST['maxPrice']? $_POST['maxPrice'] : 9999999999;
}


if (isset($_POST['house_add_btn'])) {
    $perks = $_POST['perks'];
    $perks ? $inputData['perks'] = implode(',', $perks) : [];
    $inputData['username'] = $_SESSION['auth_user']["user_username"];

    $house->create($inputData);
}
if (isset($_POST['clear'])) {
    $house->houseDetails();
}
