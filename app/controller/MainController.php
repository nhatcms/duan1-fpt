<?php
require_once './app/model/MainModel.php';
require_once './app/controller/AccountController.php';
require_once './app/controller/ProductController.php';
require_once './app/controller/CategoryController.php';
class MainController
{
    public $Model;
    public function __construct()
    {
        $this->Model = new MainModel();
    }
    public static function homeController()
    {
        
        $banners = BannerModel::getBanner();
        
        $categoriesWithProducts = CategoryModel::getAllCategoriesWithProducts();
        require_once './app/view/home.php';
    }
    public static function cartController()
    {
        
        require_once './app/view/giohang.php';
    }
    public static function searchController()
    {
        $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : 'galaxy';
        $products = ProductModel::searchProductByName($keyword);
        require_once './app/view/search.php';
    }
    public static function updateCartProductQuantity()
    {
        $id = $_GET['id']; 
        $quantity = $_POST['quantity']; 
    
        
        if (isset($_SESSION['cart'][$id]) && $quantity > 0) {
            
            $_SESSION['cart'][$id]['quantity'] = $quantity;
        }
    
        
        header('Location: ?action=cart');
        exit();
    }
    public static function checkOutController()
    {
        
        if (empty($_SESSION['cart'])) {
            echo '<script>alert("Giỏ hàng của bạn đang trống!"); window.location.href = "?action=cart";</script>';
            exit;
        }        
        
        $totalQuantity = 0;
        $tongGioHang = 0;
    
        foreach ($_SESSION['cart'] as $sanPham) {
            $totalQuantity += $sanPham['quantity'];
            $tongGioHang += $sanPham['price'] * $sanPham['quantity'];
        }
        
        $tongGioHang = (int) $tongGioHang;
        if (isset($_POST['order-btn'])) {
            $paymentMethod = $_POST['payment_method'];
            if($paymentMethod == 'COD'){
                $Model = new OrderModel();
                $order = [
                    'user_id' => $_SESSION['user_id'],
                    'total_amount' => $tongGioHang, 
                    'payment_method' => $_POST['payment_method'],
                    'address' => $_POST['address'],         
                    'order_code' => strtoupper(substr(md5(uniqid()), 0, 6)), 
                    'status' => 'Pending'               
                ];
                $order_id = $Model->createOrder($order);
                if ($order_id) {
                    
                    foreach ($_SESSION['cart'] as $sanPham) {
                        $orderDetail = [
                            'order_id' => $order_id,
                            'product_id' => $sanPham['id'],
                            'quantity' => $sanPham['quantity'],
                            'price' => $sanPham['price']
                        ];
                        OrderModel::createOrderDetail($orderDetail);
                    }
                    $AlertModel = new AlertModel();
                    $AlertModel->showAlertWithRedirect('success', 'Đặt hàng thành công!', 'Cảm ơn bạn đã mua hàng tại cửa hàng chúng tôi!', '?action=history');
                    unset($_SESSION['cart']);

                    exit;
                }
            }else{
                
            }
        }
        
        require_once './app/view/pay.php';
    }
    public static function orderDetailController()
    {
        
        $order_code = isset($_GET['order_code']) ? $_GET['order_code'] : 0;
        if ($order_code == 0) {
            echo '<script>alert("Không tìm thấy đơn hàng!"); window.location.href = "?action=history";</script>';
            exit;
        }
        $order = OrderModel::getOrderByOrderCode($order_code);
        $order_details = OrderModel::getOrderDetail($order_code);
        require_once './app/view/order_detail.php';
    }
}
