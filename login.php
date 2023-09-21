<?php
include "./config/app.php";
$auth->isLoggedIn();
include "./inc/header.php";
?>

<body>
    <div class="wrapper">
        <a class="icon-close" href="index.php"> <i class='bx bx-x'></i></a>
        <div class="form-box login">
            <?php include "./message.php" ?>
            <h2>Login</h2>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" autocomplete="off">
                <div class="input-box">
                    <label>Username</label>
                    <input type="text" name="username" value="" autocomplete="off" required />
                </div>
                <div class="input-box">
                    <label>Password</label>
                    <input type="password" name="password" value="" autocomplete="off"  required />
                </div>
                <button class="form-btn" type="submit" name="login_btn">Login</button>
                <div class="login-register">
                    <p>Don't have an Account?
                        <a href="register.php" class="register-link">Register</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

</body>

</html>