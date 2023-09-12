<?php
include "./inc/header.php";
include "./requests.php"
?>


<body>
    <form class="form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <h2>Login</h2>
        <label class="form-label"><span>Username</span></label>
        <input type="text" name="username" required/>
        <label><span>Password</span></label>
        <input type="password" name="password" required/>
        <a href="login.php">register</a>
        <button class="form-btn" type="submit" name="login">Login</button>
    </form>

</body>

</html>
<?php
req_login()

?>