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
            <h2>Profile</h2>
            <?php include "./message.php";
                    if (isset($_GET['id'])) {
                        $user_id = mysqli_real_escape_string($db->conn, $_GET['id']);
                        $user = new UserController;
                        $data = $user->edit($user_id);
                    }
        
            ?>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <input type="hidden" name="id" value="<?= $user_id; ?>" />
                <div class="input-box">
                    <label>Username</label>
                    <input type="text" name="username"  value=<?= $data["username"] ?> />
                </div>
                <div class="input-box">
                    <label>Email</label>
                    <input type="email" name="email" value=<?= $data["email"] ?> pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" title="Email must contain @ in email address, example(user@gmail.com)" required />

                </div>
                <div class="input-box">
                    <label>Phone</label>
                    <input type="phone" name="phone" value=<?= $data["phone"] ?> pattern="[0-9]{3}-[0-9]{7}|[0-9]{10}" title="your phone must to be 10 digits" required />
                </div>
                <button type="submit" name="user_update_btn" class="form-btn">Update</button>
            </form>
        </div>
    </div>


</div>