<?php
include "./inc/header.php";
include "./config/app.php";
include "./code/auth.php";

// $usernameErr = $emailErr = $phoneErr = $passwordErr = $confirm_passwordErr = "";
?>


<body>
    <div class="wrapper">
        <a class="icon-close" href="index.php"> <i class='bx bx-x'></i></a>
        <div class="form-box login">
            <?php include "./message.php"?>
            <h2>Register</h2>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <div class="input-box">
                    <input type="text" name="username" value="" autocomplete="off" required />
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <input type="email" name="email" value="" autocomplete="off" required />
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <input type="phone" name="phone" value="" autocomplete="off" required />
                    <label>Phone</label>
                </div>
                <div class="input-box">
                    <input type="password" name="password" value="" autocomplete="off"  required />
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <input type="password" name="confirm_password" value="" autocomplete="off" required />
                    <label>Confirm Password</label>
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