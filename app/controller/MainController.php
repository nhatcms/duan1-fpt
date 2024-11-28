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
        if (isset($_POST['order-btn'])) {
            $Model = new OrderModel();
            $order = [
                'user_id' => $_SESSION['user_id'],
                'total_amount' => $tongGioHang + 30000, // Tổng tiền bao gồm phí vận chuyển
                'payment_method' => $_POST['payment_method'],
                'address' => $_POST['address'],         // Địa chỉ nhập từ form
                'order_code' => strtoupper(substr(md5(uniqid()), 0, 6)), // Tạo mã đơn hàng
                'status' => 'Pending'               // Trạng thái mặc định
            ];

            // Tạo đơn hàng và lấy ID của đơn hàng vừa tạo
            $order_id = $Model->createOrder($order);


            
            // $order_id = OrderModel::createOrder($order);
        
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
        
                
                unset($_SESSION['cart']);
        
                
                $AlertModel = new AlertModel();
                $AlertModel->showAlertWithRedirect('success', 'Đặt hàng thành công!', 'Cảm ơn bạn đã mua hàng tại cửa hàng chúng tôi!', '?action=history');
                // exit;
            }
        }
        
        require_once './app/view/pay.php';
    }
}
