<?php
require_once "models/AuthModel.php";
require_once "models/OrderModel.php";

class OrderController{
    public function __construct()
    {
    }
    public static function orderController(){
        $authModel = new AuthModel();
        $authModel->check_login();
        $orderModel = new OrderModel();
        $orders = $orderModel->getAllOrder();
        require_once "views/order.php";
    }
    public static function editOrderController() {
        $authModel = new AuthModel();
        $authModel->check_login();
        $orderModel = new OrderModel();
        $id = $_GET['id'];
        $order = $orderModel->getOrderById($id);
    
        if (isset($_POST['update-btn'])) {
            $id = $_POST['id'];
            $address = $_POST['address'];
            $status = $_POST['status'];
    
            // Kiểm tra nếu trạng thái mới giống trạng thái hiện tại
            if ($status === $order['status']) {
                $_SESSION['isSuccess'] = false;
                $_SESSION['alert'] = 'Không thể thay đổi đơn hàng đã hoàn thành.';
            } else {
                    $orderModel->editOrder($id, $status, $address);
                    $_SESSION['isSuccess'] = true;
                    $_SESSION['alert'] = 'Cập nhật đơn hàng thành công.';
            }
    
            header("Location: ?action=editOrder&id=$id");
            exit;
        }
    
        require_once "views/edit-order.php";
    }
    
    
}
