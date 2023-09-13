<?php
include "./inc/header.php";
include "./requests.php"
?>


<body>
    <div class="wrapper">
        <div class="form-box login">
            <h2>Login</h2>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <div class="input-box">
                    <span class="icon"><i class='bx bx-user'></i></span>
                    <input type="text" name="username" required />
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class='bx bx-key'></i></span>
                    <input type="password" name="password" required />
                    <label>Password</label>
                </div>
                <div class="register-login">
                    <p>Don't have an Account?
                        <a href="register.php" class="register-link">Register</a>
                    </p>
                </div>
                <button class="form-btn" type="submit" name="login">Login</button>
            </form>
        </div>
    </div>

</body>

</html>
<?php
req_login()

?>