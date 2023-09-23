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
    <div class="wrapper">
        <a class="icon-close" href="index.php"> <i class='bx bx-x'></i></a>
        <div class="form-box login">
            <?php include "./message.php" ?>
            <h2>Home</h2>
            <form>
                <div class="input-box">
                    <label>Username : <?= $houseDetails["username"] ?> </label>
                </div>
                <div class="input-box">
                    <label>Email : <?= $houseDetails["city"] ?> </label>
                </div>
                <div class="input-box">
                    <label>Phone : <?= $houseDetails["price"] ?> </label>
                </div>
                <div class="input-box">
                    <label>Username : <?= $houseDetails["rooms"] ?> </label>
                </div>
                <div class="input-box">
                    <label>Created At : <?= date_format(date_create($houseDetails['create_date']), 'g:ia \o\n l jS F Y'); ?> </label>
                </div>
            </form>
        </div>
    </div>


</div>