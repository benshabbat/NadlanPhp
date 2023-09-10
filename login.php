<?php
include "./html/header.html";
include "./requests.php"
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
    <form class="form" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <h2 class="header">Login</h2>
        <label class="form-label"><span>Username</span></label>
        <input type="text" name="username" required/>
        <label><span>Password</span></label>
        <input type="password" name="password" required/>
        <button class="form-btn" type="submit" name="login">Login</button>
    </form>

</body>

</html>
<?php
req_login()

?>