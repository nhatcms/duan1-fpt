<?php

session_start();

require_once __DIR__ . '/app/controller/MainController.php';
require_once __DIR__ . '/app/model/MainModel.php';



$action = isset($_GET['action']) ? $_GET['action'] : 'home';

//Home controller
if ($action == 'home') {
    MainController::homeController();
}

//Account controller
elseif ($action == 'register') {
    AccountController::accountRegController($Model);
} elseif ($action == 'login') {
    AccountController::accountLoginController($Model);
} elseif ($action == 'logout') {
    AccountController::accountLogoutController();
}elseif ($action == 'profile') {
    AccountController::accountProfileController();
}elseif ($action == 'changePass') {
    AccountController::changePassController();
}
// } elseif ($action == 'history') {
//     AccountController::accountHistoryController();
// }
//Product controller
elseif ($action == 'search') {
    MainController::searchController();
} elseif ($action == 'product') {
    ProductController::productController();
} elseif ($action == 'category') {
    CategoryController::categoryController();
}

//cart
elseif ($action =='cart') {
    MainController::cartController();
}elseif ($action =='checkout') {
    MainController::checkOutController();
}



// Else 404
else {
    echo 'Oops! This function is building';
    die();
}
