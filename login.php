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
    <form action="index.php" method="post">
        <h2>Login</h2>
        <label>Username</label><br>
        <input type="text" name="username" /><br>
        <label>Password</label><br>
        <input type="password" name="password" /><br>
        <button type="submit">Login</button>
    </form>

</body>

</html>