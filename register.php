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
        <input type="text" name="username" required/><br>
        <label>Email</label><br>
        <input type="email" name="email" required/><br>
        <label>Phone</label><br>
        <input type="phone" name="phone" required/><br>
        <label>Password</label><br>
        <input type="password" name="password" required/><br>
        <label>Password</label><br>
        <input type="password" name="password2" required/><br>
        <button type="submit" name="register">Register</button>
    </form>

</body>

</html>
<?php
if (isset($_POST['register'])) {
    $username =  filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $email =  filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $password2 = filter_input(INPUT_POST, "password2", FILTER_SANITIZE_SPECIAL_CHARS);
    $hash = "";
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