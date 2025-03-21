<?php
if (!isset($_SESSION['logged_in'])) {
    echo '<script>alert("Bạn cần đăng nhập để thực hiện chức năng này!"); window.location.href = "?action=login";</script>';
    exit;
}

// Process the form submission if the order button is clicked
if (isset($_POST['order-btn'])) {
    // Save the order information to the session before redirecting
    $_SESSION['order_info'] = [
        'user_id' => $_SESSION['user_id'],
        'date' => date('Y-m-d H:i:s', time() + 7 * 3600),
        'address' => $_POST['address'],
        'payment_method' => $_POST['payment_method'],
        'cart' => $_SESSION['cart'],
        'total' => $tongGioHang + 30000, 
    ];

    // Check if the payment method is VNPAY and handle accordingly
    if (isset($_POST['payment_method']) && $_POST['payment_method'] == 'VNPAY') {
        echo '<script>
                window.location.href = "./vnpay_php/vnpay_create_payment.php";  // Redirect to VNPAY payment page
              </script>';
        exit;
    }else{
        // Redirect to the checkout page
        echo '<script>
                window.location.href = "?action=checkout";  // Redirect to the checkout page
              </script>';
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <?php require_once 'header.php'; ?>
    <div class="checkout-main-wrapper section-padding" style="margin: 70px;">
        <div class="container">
            <div class="row">
                <!-- Form thông tin thanh toán -->
                <div class="col-lg-8">
                    <h4 class="mb-4">Thông tin thanh toán & giao hàng </h4>
                    <form action="#" method="POST" id="payment-form">
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ tên người nhận</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="<?= htmlspecialchars($_SESSION['name']) ?>" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                value="<?= htmlspecialchars($_SESSION['phone']) ?>" readonly required
                                pattern="^[0-9]{10}$"
                                title="Số điện thoại phải có 10 chữ số và không chứa ký tự đặc biệt hoặc chữ cái.">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email nhận thông tin</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?= htmlspecialchars($_SESSION['email']) ?>" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ giao hàng</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        </div>

                        <h5 class="mt-4">Phương thức thanh toán</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="cod" value="COD" required>
                            <label class="form-check-label" for="cod">
                                Thanh toán khi nhận hàng (COD)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="vnpay" value="VNPAY">
                            <label class="form-check-label" for="vnpay">
                                Thanh toán qua VNPAY
                            </label>
                        </div>
                        <input type="hidden" name="total_amount" value="<?= $tongGioHang + 30000 ?>">

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary w-100" name="order-btn" id="order-btn">Xác nhận gửi đơn</button>
                        </div>
                    </form>
                </div>

                <!-- Chi tiết đơn hàng -->
                <div class="col-lg-4">
                    <h5>Chi tiết đơn hàng</h5>
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">Tên sản phẩm</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-end">Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION['cart'] as $sanPham): ?>
                            <tr>
                                <td><?= htmlspecialchars($sanPham['name']) ?></td>
                                <td class="text-center"><?= $sanPham['quantity'] ?></td>
                                <td class="text-end">
                                    <?= number_format($sanPham['price'] * $sanPham['quantity'], 0, ',', '.') ?> đ</td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot class="table-light">
                            <tr>
                                <td colspan="2" class="text-start">Tổng tiền sản phẩm</td>
                                <td class="text-end"><?= number_format($tongGioHang, 0, ',', '.') ?> đ</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-start">Phí vận chuyển</td>
                                <td class="text-end">30.000 đ</td>
                            </tr>
                            <tr class="total fw-bold">
                                <td colspan="2" class="text-start"><strong>Tổng thanh toán</strong></td>
                                <td class="text-end"><strong><?= number_format($tongGioHang + 30000, 0, ',', '.') ?>
                                        đ</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                    <!-- back to cart button -->
                    <a href="?action=cart" class="btn btn-secondary w-100 mt-3">Quay lại giỏ hàng</a>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>

</body>

</html>
