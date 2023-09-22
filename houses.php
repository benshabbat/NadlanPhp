<?php
include_once "./controllers/AuthController.php";
$userDetails = $authenticated->authUserDetail();
include "./inc/header.php";
?>

<div>

    <h1>Houses</h1>
    <a href="house-add.php">Add House</a>

</div>