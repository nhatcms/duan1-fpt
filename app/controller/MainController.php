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
        // get alll banners
        $banners = BannerModel::getBanner();
        // get all categories with products
        $categoriesWithProducts = CategoryModel::getAllCategoriesWithProducts();
        require_once './app/view/home.php';
    }
    public static function cartController()
    {
        // get all products in cart by id        
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
        $id = $_GET['id']; // Lấy ID sản phẩm từ URL
        $quantity = $_POST['quantity']; // Lấy số lượng từ form (số lượng có thể được gửi từ nút tăng hoặc giảm)
    
        // Kiểm tra nếu sản phẩm tồn tại trong giỏ hàng và số lượng hợp lệ
        if (isset($_SESSION['cart'][$id]) && $quantity > 0) {
            // Cập nhật số lượng sản phẩm trong giỏ hàng
            $_SESSION['cart'][$id]['quantity'] = $quantity;
        }
    
        // Điều hướng lại giỏ hàng
        header('Location: ?action=cart');
        exit();
    }
    public static function checkOutController()
    {
        // Kiểm tra nếu giỏ hàng trống
        if (empty($_SESSION['cart'])) {
            echo '<script>alert("Giỏ hàng của bạn đang trống!"); window.location.href = "?action=cart";</script>';
            exit;
        }
    
        // Lấy tổng số lượng và tổng giá trị giỏ hàng
        $totalQuantity = 0;
        $tongGioHang = 0;
    
        foreach ($_SESSION['cart'] as $sanPham) {
            $totalQuantity += $sanPham['quantity'];
            $tongGioHang += $sanPham['price'] * $sanPham['quantity'];
        }
        require_once './app/view/pay.php';
    }
}
