<?php
include "./database.php";
$sql = "INSERT INTO users (username, email, phone, password) VALUES ('$username', '$email','$phone', ' $hash')";

try {
    mysqli_query($conn, $sql);
    echo "user is now registered";
} catch (mysqli_sql_exception) {
    echo "you are cant register";
}
mysqli_close($conn);
?>