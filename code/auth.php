<?php
include_once "./controllers/RegisterController.php";
include_once "./controllers/LoginController.php";
$auth = new LoginController;
$username =  filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
$email =  filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
$confirm_password = filter_input(INPUT_POST, "confirm_password", FILTER_SANITIZE_SPECIAL_CHARS);

if (isset($_POST['logout_btn'])) {
    $auth->logout();
}

if (isset($_POST['login_btn'])) {
    $password = md5($password);
    $auth->userLogin($username, $password);
}

if (isset($_POST['register_btn'])) {
    $register = new RegisterController;
    if (strcmp($password, $confirm_password) == 0) {
        $password = md5($password);
        $result_email =$register->isEmailExist($email);
        $result_user = $register->isUserExist($username);
        if (!$result_user&&!$result_email) {
            $register->registration($username, $email, $phone, $password);
        } else {
            redirect("Register Faild", "register.php");
        }
    } else {
        redirect("The password dosen't match", "register.php");
    }
}
