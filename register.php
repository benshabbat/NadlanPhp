<?php
include "./inc/header.php";
include "./requests.php";
req_register();
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

    <form class="form"  action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <h2 class="header">Register</h2>
        <label class="form-label"><span>Username</span></label>
        <input type="text" name="username"  required/>
        <label class="form-label"><span>Email</span></label>
        <input type="email" name="email" required/>
        <label class="form-label"><span>Phone</span></label>
        <input type="phone" name="phone" required/>
        <label class="form-label"><span>Password</span></label>
        <input type="password" name="password" required/>
        <label class="form-label"><span>Confirm Password</span></label>
        <input type="password" name="confirm_password" required/>
        <button class="form-btn" type="submit" name="register">Register</button>
    </form>

</body>

</html>
