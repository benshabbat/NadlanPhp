<?php
function sql_register($username,$email,$phone,$hash)
{
    include "./config/database.php";
    $sql = "INSERT INTO users (username, email, phone, password) VALUES ('$username', '$email','$phone', ' $hash')";

    try {
        mysqli_query($conn, $sql);
        echo "user is now registered";
    } catch (mysqli_sql_exception) {
        echo "you are cant register";
    }
    mysqli_close($conn);
}
?>
<?php
function sql_login($username,$password)
{
    include "./config/database.php";
    $sql = "INSERT INTO users (username, password) VALUES ('$username', ' $password')";

    try {
        mysqli_query($conn, $sql);
        echo "user is now logged in";
    } catch (mysqli_sql_exception) {
        echo "you are cant login";
    }
    mysqli_close($conn);
}
?>