<?php
include "./config/app.php";
include_once "./controllers/AuthController.php";
include_once "./controllers/HouseController.php";
$authenticated = new AuthController;
$data = $authenticated->authUserDetail();
include "./inc/header.php";
?>

<div>
    <div class="wrapper">
        <a class="icon-close" href="index.php"> <i class='bx bx-x'></i></a>
        <div class="form-box login">
            <?php include "./message.php" ?>
            <h2>Profile</h2>
            <form>
                <div class="input-box">
                    <label>Username : <?= $data["username"] ?> </label>
                </div>
                <div class="input-box">
                    <label>Email : <?= $data["email"] ?> </label>
                </div>
                <div class="input-box">
                    <label>Phone : <?= $data["phone"] ?> </label>
                </div>
                <div class="input-box">
                    <label>Created At : <?= date_format(date_create($data['reg_date']), 'g:ia \o\n l jS F Y'); ?> </label>
                </div>
                <div class="input-box">
                    <label><a href="house-view.php">Your Houses</a></label>
                </div>
                <div class="input-box">
                    <label><a href="./profile-edit.php?id=<?= $data['id']; ?>">Edit</a></label>
                </div>

            </form>
        </div>
    </div>


</div>