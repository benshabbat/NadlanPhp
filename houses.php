<?php
include "./config/app.php";
include_once "./controllers/AuthController.php";
$authenticated = new AuthController;
$userDetails = $authenticated->authUserDetail();
include "./inc/header.php";
?>

<div>

    <h1>Houses</h1>
    <a href="house-add.php">Add House</a>

</div>