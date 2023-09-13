<?php
include "./inc/header.php";
include "./requests.php";
req_register();
$usernameErr = $emailErr = $phoneErr = $passwordErr = $confirm_passwordErr = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Nadlan</title>
</head>

<body>
    <div class="wrapper">
        <span class="icon-close"><i class='bx bx-x'></i></span>
        <div class="form-box login">
            <h2>Register</h2>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <div class="input-box">
                    <span class="icon"><i class='bx bx-user'></i></span>
                    <input type="text" name="username" required />
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class='bx bx-user'></i></span>
                    <input type="email" name="email" required />
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class='bx bx-key'></i></span>
                    <input type="phone" name="phone" required />
                    <label>Phone</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class='bx bx-key'></i></span>
                    <input type="password" name="password" required />
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class='bx bx-key'></i></span>
                    <input type="confirm_password" name="confirm_password" required />
                    <label>Confirm Password</label>
                </div>
                <button class="form-btn" type="submit" name="register">Register</button>
                <div class="login-register">
                    <p>Do you have an Account?
                        <a href="login.php" class="register-link"> Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

</body>



</html>