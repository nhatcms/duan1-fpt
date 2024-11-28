<?php
require_once "models/Main.php";

class DashController
{
    public static function homeController()
    {
        $authModel = new AuthModel();
        $authModel->check_login();
        require_once "views/dashboard.php";
    }
}
