<?php
include "./inc/header.php";
include "./requests.php"
?>


<body>
    <div class="wrapper">
        <div class="form-box login">
            <h2 class=form-header>Login</h2>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <div class="input-box">
                    <span class="icon"></span>
                    <input type="text" name="username" required />
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"></span>
                    <input type="password" name="password" required />
                    <label>Password</label>
                </div>
                <a href="register.php">register</a>
                <button class="form-btn" type="submit" name="login">Login</button>
            </form>
        </div>
    </div>

</body>

</html>
<?php
req_login()

?>