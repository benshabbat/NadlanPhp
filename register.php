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
        <button type="submit" name="register">Register</button>
    </form>

</body>

</html>
<?php
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $hash="";
    if (strcmp($password, $password2) == 0) {

        $hash = password_hash($password, PASSWORD_DEFAULT);
    }
    $sql = "INSERT INTO users (username, email, phone, password) VALUES ('$username', '$email','$phone', ' $hash')";

    try {
        mysqli_query($conn, $sql);
        echo "user is now registered";
    } catch (mysqli_sql_exception) {
        echo "you are cant register";
    }
}
echo password_verify($password,  $hash) . '<br>';

echo $hash;
mysqli_close($conn)

?>