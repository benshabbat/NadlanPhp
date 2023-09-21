<?php
include "./config/app.php";

class AuthController{


    public function __construct()
    {
       $this->checkIsLoggedIn();
    }

    private function checkIsLoggedIn(){
        if(isset($_SESSION['authenticted']))
        {
            redirect("you need to login","login.php");
            return true;
        }
        else return false;
    }

    public function authDetail(){

    }

}
 $authenticted = new AuthController;
