<?php
// include "./database.php";
echo "hello";
include "./sql.php";
function req_register()
{

    if (isset($_POST['register'])) {
        $username =  filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $email =  filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $confirm_password = filter_input(INPUT_POST, "confirm_password", FILTER_SANITIZE_SPECIAL_CHARS);
        $hash = "";
        if (strcmp($password, $confirm_password) == 0) {

            $hash = password_hash($password, PASSWORD_DEFAULT);
        }
        sql_register($username, $email, $phone, $hash);
        // $sql = "INSERT INTO users (username, email, phone, password) VALUES ('$username', '$email','$phone', ' $hash')";

        // try {
        //     mysqli_query($conn, $sql);
        //     echo "user is now registered";
        // } catch (mysqli_sql_exception) {
        //     echo "you are cant register";
        // }
    }
    echo password_verify($password,  $hash) . '<br>';

    echo $hash;
}
function req_login()
{
    if (isset($_POST['login'])) {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        sql_login($username, $password);
        header("location: /ProjectPhp/index.php");
    }
}

function req_create_home(){
    
}
// mysqli_close($conn);
