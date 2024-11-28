<?php
require_once "models/Main.php";

class AuthController 
{
    public static function loginController()
    {
        $authModel = new AuthModel();
        require_once "views/login.php";
        if (isset($_POST["log-btn"])) {
            $authModel->login();
        }
    }

    public static function logoutController()
    {
        $authModel = new AuthModel();
        $authModel->logout();
        require_once "views/login.php";
    }
}
