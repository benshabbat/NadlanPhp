<?php
include "./config/app.php";
include_once "./controllers/AuthController.php";
include_once "./controllers/HouseController.php";
$authenticated = new AuthController;
$data = $authenticated->authUserDetail();
$user = new UserController;
include "./inc/header.php";
?>

<div>
    <div class="wrapper">
        <a class="icon-close" href="index.php"> <i class='bx bx-x'></i></a>
        <div class="form-box login">
            <?php include "./message.php" ?>
            <h2>Profile</h2>
            <?php
            if (isset($_GET['id'])) {
                $user_id = mysqli_real_escape_string($db->conn, $_GET['id']);
                $data = $user->edit($user_id);

            ?>
                <form>
                    <div class="input-box">
                        <label>Username</label>
                        <input type="text" name="username" min=1 value=<?= $data["username"] ?> />
                    </div>
                    <div class="input-box">
                        <label>Email</label>
                        <input type="text" name="email" min=1 value=<?= $data["email"] ?> pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,4}$" title="Email must contain @ in email address, example(user@gmail.com)" required />

                    </div>
                    <div class="input-box">
                        <label>Phone</label>
                        <input type="text" name="email" min=1 value=<?= $data["phone"] ?>pattern="[0-9]{3}-[0-9]{7}|[0-9]{10}" title="your phone must to be 10 digits"  required />
                </div>
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
                <?php
            }
                ?>

                <button type="submit" name="user_update_btn" class="form-btn">Update</button>
                </form>
        </div>
    </div>


</div>