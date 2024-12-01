<?php
require_once "models/Main.php";

class DashController
{
    public static function homeController()
    {
        $authModel = new AuthModel();
        $orderModel = new OrderModel();
        $userModel = new UserModel();
        $productModel = new ProductModel();
        $cateModel = new CateModel();
        $authModel->check_login();
        $order_count = $orderModel->countOrder();
        $completed_order_percent = $orderModel->getPercentOrder();
        $user_count = $userModel->getUserQuanlity();
        $product_count = $productModel->getProductQuanlity();
        $renueveByCate = $cateModel->getRevenueByCategory();
        $total_revenue = $orderModel->getCompletedOrderRenueve();
        require_once "views/dashboard.php";
    }

}
