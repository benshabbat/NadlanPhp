<?php
include_once "./controllers/RegisterController.php";
include_once "./controllers/LoginController.php";
$auth = new LoginController;

if (isset($_POST['login_btn'])) {
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = md5($password);

    $checkLogin = $auth->userLogin($username, $password);
    if ($checkLogin) {
        redirect("Logged in Succesfully", "index.php");
    } else {
        redirect("Invalid Username Or Password", "login.php");
    }
}

if (isset($_POST['register_btn'])) {
    $register = new RegisterController;

    $username =  filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $email =  filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $confirm_password = filter_input(INPUT_POST, "confirm_password", FILTER_SANITIZE_SPECIAL_CHARS);
    $options = [
        'cost' => 12,
    ];
    if (strcmp($password, $confirm_password) == 0) {
        $password = md5($password);
        // $hash = password_hash($password, PASSWORD_DEFAULT,$options);
        // $hash = md5($password, PASSWORD_DEFAULT);
        $register->isEmailExist($email) ? redirect("Already Email is Exist", "register.php") : false;
        $result_user = $register->isUserExist($username);
        if ($result_user) {
            redirect("Already User is Exist", "register.php");
        } else {
            $register_query = $register->registration($username, $email, $phone, $password);
            if ($register_query) {
                redirect("Register Succesfully", "login.php");
            } else {
                redirect("Register Faild", "register.php");
            }
        }
    } else {
        redirect("The password dosen't match", "register.php");
    }
}
