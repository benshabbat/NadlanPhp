<?php
include "./inc/header.php";
include "./requests.php";
req_register();
$usernameErr = $emailErr = $phoneErr = $passwordErr = $confirm_passwordErr = "";
?>


<body>
    <div class="wrapper">
        <a class="icon-close" href="index.php"> <i class='bx bx-x'></i></a>
        <div class="form-box login">
            <h2>Register</h2>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <div class="input-box">
                    <input type="text" name="username" required />
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <input type="email" name="email" required />
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <input type="phone" name="phone" required />
                    <label>Phone</label>
                </div>
                <div class="input-box">
                    <input type="password" name="password" required />
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <input type="confirm_password" name="confirm_password" required />
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