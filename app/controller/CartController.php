<?php

class CartController
{
    public static function cartController()
    {
        // Kiểm tra giỏ hàng trong session, nếu không có thì tạo mảng rỗng
        $chiTietGioHang = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        // Tính tổng số lượng sản phẩm trong giỏ hàng
        // $totalQuantity = 0;
        // foreach ($chiTietGioHang as $item) {
        //     $totalQuantity += $item['so_luong'];
        // }
        $totalQuantity = 0;
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                $totalQuantity += $item['so_luong'];
            }
        }
        // Gọi giao diện giỏ hàng
        include  'app/view/giohang.php';
        

    }
 
}
