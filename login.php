<?php
include "./html/header.html";
include "./database.php";
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
        <h2>Login</h2>
        <label>Username</label><br>
        <input type="text" name="username" /><br>
        <label>Password</label><br>
        <input type="password" name="password" /><br>
        <button type="submit" name="login">Login</button>
    </form>

</body>

</html>
<?php

if (isset($_POST['login'])) {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
}
?>