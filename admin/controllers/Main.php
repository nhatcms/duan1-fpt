<?php
require_once "AuthController.php";
require_once "UserController.php";
require_once "CateController.php";
require_once "ProductController.php";
require_once "CommentController.php";
require_once "DashController.php";
require_once "OrderController.php";

class Main
{
    public static function route($action, $id = null)
    {
        switch ($action) {
            // Auth
            case "login":
                AuthController::loginController();
                break;
            case "logout":
                AuthController::logoutController();
                break;
            case "home":
                DashController::homeController();
                break;
            // User
            case "user":
                UserController::userController();
                break;
            case "addUser":
                UserController::addUserController();
                break;
            case "updateUser":
                UserController::updateUserController($id);
                break;
            // Category
            case "cate":
                CateController::cateController();
                break;
            case "deleteCate":
                CateController::deleteCateController($id);
                break;
            case "addCate":
                CateController::addCateController();
                break;
            case "editCate":
                CateController::editCateController($id);
                break;
            // Product
            case "product":
                ProductController::productController();
                break;
            case "addProduct":
                ProductController::addProductController();
                break;
            case "editProduct":
                ProductController::editProductController($id);
                break;
                // Comment
            case "comment":
                CommentController::showCommentController();
                break;
            case "deleteComment":
                CommentController::deleteCommentController($id);
                break;
            // Order
            case "order":
                OrderController::orderController();
                break;
            case "editOrder":
                OrderController::editOrderController($id);
                break;
            default:
                DashController::homeController();
                break;
        }
    }
}
