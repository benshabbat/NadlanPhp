<?php
include "./config/app.php";
include_once "./controllers/HouseController.php";
include "./upload.php";



if (isset($_POST['house_add_btn'])) {
    $username = $_SESSION['auth_user']["user_username"];
    $property_type = $_POST['property_type'];
    $city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_SPECIAL_CHARS);
    $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
    $floor = filter_input(INPUT_POST, "address", FILTER_SANITIZE_NUMBER_INT);
    $description =  filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_INT);
    $rooms = filter_input(INPUT_POST, "rooms", FILTER_SANITIZE_NUMBER_INT);
    $sqm = filter_input(INPUT_POST, "sqm", FILTER_SANITIZE_NUMBER_INT);
    $perks = $_POST['perks'];
    $perks = implode(',', $perks);


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
        'images' => $files_array,
        'perks' => $perks,

    ];

    $house = new HouseController;
    $house->create($inputData);
}
