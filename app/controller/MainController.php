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
                //chạy handleMail
                if ($order_id) {
                    foreach ($_SESSION['cart'] as $sanPham) {
                        $orderDetail = [
                            'order_id' => $order_id,
                            'product_id' => $sanPham['id'],
                            'quantity' => $sanPham['quantity'],
                            'price' => $sanPham['price']
                        ];
                    OrderModel::createOrderDetail($orderDetail);
                    $mailContent = "
                    <!DOCTYPE html>
                    <html lang='en'>
                    <head>
                        <meta charset='UTF-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                background-color: #f9f9f9;
                                color: #333;
                                margin: 0;
                                padding: 0;
                            }
                            .email-container {
                                max-width: 600px;
                                margin: 20px auto;
                                background-color: #ffffff;
                                border-radius: 8px;
                                overflow: hidden;
                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                            }
                            .email-header {
                                background-color: #4d4d4d;
                                color: white;
                                text-align: center;
                                padding: 15px;
                            }
                            .email-body {
                                padding: 20px;
                            }
                            .email-body h1 {
                                font-size: 22px;
                                margin-bottom: 20px;
                            }
                            .email-body p {
                                font-size: 16px;
                                line-height: 1.5;
                                margin-bottom: 10px;
                            }
                            .order-details {
                                margin-top: 20px;
                                border-top: 1px solid #ddd;
                                padding-top: 15px;
                            }
                            .order-details table {
                                width: 100%;
                                border-collapse: collapse;
                            }
                            .order-details th,
                            .order-details td {
                                text-align: left;
                                padding: 8px 0;
                            }
                            .order-details th {
                                font-weight: bold;
                                color: #555;
                            }
                            .email-footer {
                                text-align: center;
                                font-size: 14px;
                                color: #777;
                                padding: 10px;
                                background-color: #f1f1f1;
                            }
                        </style>
                    </head>
                    <body>
                        <div class='email-container'>
                            <div class='email-header'>
                                <h2>Mobile Land</h2>
                            </div>
                            <div class='email-body'>
                                <h1>Xác Nhận Đơn Hàng</h1>
                                <p>Cảm ơn bạn đã tin tưởng. Đơn hàng của bạn đã được tạo thành công</p>
                                <p>Dưới đây là thông tin cơ bản về đơn hàng: </p>
                                <div class='order-details'>
                                    <table>
                                        <tr>
                                            <th>Mã đơn:</th>
                                            <td>{$order['order_code']}</td>
                                        </tr>
                                        <tr>
                                            <th>Số tiền:</th>
                                            <td>" . number_format($order['total_amount'], 0, ',', '.') . " VND</td>
                                        </tr>
                                        <tr>
                                            <th>Phương thức thanh toán:</th>
                                            <td>Thanh toán khi nhận hàng (COD)</td>
                                        </tr>
                                        <tr>
                                            <th>Địa chỉ giao hàng:</th>
                                            <td>{$order['address']}</td>
                                        </tr>
                                    </table>
                                </div>
                                <p>Nếu có bất kỳ thắc mắc nào vui lòng cung cấp mã đơn cho QTV!</p>
                            </div>
                            <div class='email-footer'>
                                &copy; 2024 Mobile Land. All rights reserved.
                            </div>
                        </div>
                    </body>
                    </html>
                    ";

                    MailModel::sendMail($_SESSION['email'], 'MobileLand - Thông báo đơn hàng mới', $mailContent);

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
