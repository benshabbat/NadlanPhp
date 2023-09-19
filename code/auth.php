<?php
include_once "./controllers/RegisterController.php";

$username = $email = $phone = $password = $confirm_password = $hash = "";
if (isset($_POST['register_btn'])) {
    $register = new RegisterController;

    $username =  filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $email =  filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $confirm_password = filter_input(INPUT_POST, "confirm_password", FILTER_SANITIZE_SPECIAL_CHARS);

    if (strcmp($password, $confirm_password) == 0) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $result_user = $register->isUserExist($email);
        if($result_user){
            redirect("Already Email is Exist","register.php");
        }else{
            $register_query= $register->registration($username, $email, $phone, $hash);
            if($register_query){
                redirect("Register Succesfully","login.php");
            }
            else{
                redirect("Register Faild","register.php");
            }
        }
    }
    else{
        redirect("the password dosen't match","register.php");
    }

}
