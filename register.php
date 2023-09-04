<?php
include "./html/header.html"

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

    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <h2>Register</h2>
        <label>Username</label><br>
        <input type="text" name="username" /><br>
        <label>Email</label><br>
        <input type="email" name="email" /><br>
        <label>Phone</label><br>
        <input type="phone" name="phone" /><br>
        <label>Password</label><br>
        <input type="password" name="password" /><br>
        <label>Password</label><br>
        <input type="password" name="password2" /><br>
        <button type="submit">Register</button>
    </form>

</body>

</html>