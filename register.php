<?php
include "./config/app.php";

$auth->isLoggedIn();
include "./inc/header.php";
?>


<body>
    <div class="wrapper">
        <a class="icon-close" href="index.php"> <i class='bx bx-x'></i></a>
        <div class="form-box login">
            <?php include "./message.php"?>
            <h2>Register</h2>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <div class="input-box">
                    <label>Username</label>
                    <input type="text" name="username" autocomplete="off" required />
                </div>
                <div class="input-box">
                    <label>Email</label>
                    <input type="email" name="email" autocomplete="off" required />
                </div>
                <div class="input-box">
                    <label>Phone</label>
                    <input type="phone" name="phone" autocomplete="off" required />
                </div>
                <div class="input-box">
                    <label>Password</label>
                    <input type="password" name="password" ="off"  required />
                </div>
                <div class="input-box">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" autocomplete="off" required />
                </div>
                <button class="form-btn" type="submit" name="register_btn">Register</button>
                <div class="login-register">
                    <p>Already have an Account?
                        <a href="login.php" class="register-link"> Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

</body>



</html>