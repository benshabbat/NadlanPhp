<?php
include "./config/app.php";
include_once "./controllers/AuthController.php";
include_once "./controllers/HouseController.php";
$authenticated = new AuthController;
$house = new HouseController;
$houseDetails = $house->houseDetail();
include "./inc/header.php";
?>

<div>

    <h1>Houses</h1>
    <a href="house-add.php">Add House</a>
    <a href="house-view.php">View House</a>

</div>