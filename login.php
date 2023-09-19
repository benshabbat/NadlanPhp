<?php
include "./inc/header.php";
// include "./requests.php";
include("./config/app.php");
?>

<body>
    <div class="wrapper">
        <a class="icon-close" href="index.php"> <i class='bx bx-x'></i></a>
        <div class="form-box login">
            <h2>Login</h2>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <div class="input-box">
                    <input type="text" name="username" required />
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <input type="password" name="password" required />
                    <label>Password</label>
                </div>
                <button class="form-btn" type="submit" name="login">Login</button>
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
<?php
// req_login()

?>