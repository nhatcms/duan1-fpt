<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <?php require_once 'header.php'; ?>
    <?php
    if (isset($_SESSION['alert'])) {
        echo '<script>swal("Thông báo", "' . $_SESSION['alert'] . '", "success")</script>';
        unset($_SESSION['alert']);
    }
    ?>

    <div class="cart-main-wrapper section-padding" style="margin: 80px;">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-table table-responsive">
                            <h4 class="text-left mb-3">
                                Bạn hiện có
                                <span style="color: #4ca3ff; font-weight: bold;">
                                    <?= isset($totalQuantity) ? $totalQuantity : 0 ?>
                                </span>
                                sản phẩm trong giỏ hàng.
                            </h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">Ảnh sản phẩm</th>
                                        <th class="pro-title">Tên sản phẩm</th>
                                        <th class="pro-price">Giá tiền</th>
                                        <th class="pro-quantity">Số lượng</th>
                                        <th class="pro-subtotal">Tổng tiền</th>
                                        <th class="pro-remove">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tongGioHang = 0;
                                    if (!empty($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] as $sanPham) {
                                            $tongTien = $sanPham['price'] * $sanPham['quantity'];
                                            $tongGioHang += $tongTien;
                                    ?>
                                    <tr>
                                        <td class="pro-thumbnail">
                                            <img src="./assets/img/<?= $sanPham['img'] ?>" alt="Product" style="width: 80px;">
                                        </td>
                                        <td class="pro-title"><?= $sanPham['name'] ?></td>
                                        <td class="pro-price"><?= number_format($sanPham['price'], 0, ',', '.') ?> đ</td>
                                        <td class="pro-quantity">
                                            <button onclick="updateQuantity(<?= $sanPham['id'] ?>, <?= $sanPham['quantity'] - 1 ?>)" 
                                                    class="btn btn-outline-secondary btn-sm" <?= $sanPham['quantity'] <= 1 ? 'disabled' : '' ?>>
                                                -
                                            </button>
                                            <input type="number" value="<?= $sanPham['quantity'] ?>" 
                                                min="1" style="width: 60px;" class="form-control d-inline-block text-center" readonly>
                                            <button onclick="updateQuantity(<?= $sanPham['id'] ?>, <?= $sanPham['quantity'] + 1 ?>)" 
                                                    class="btn btn-outline-secondary btn-sm">
                                                +
                                            </button>
                                        </td>
                                        <td class="pro-subtotal"><?= number_format($tongTien, 0, ',', '.') ?> đ</td>
                                        <td class="pro-remove">
                                            <button class="btn btn-danger" onclick="confirmDelete(<?= $sanPham['id'] ?>)">Xoá</button>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    } else {
                                        echo '<tr><td colspan="6" class="text-center">Giỏ hàng của bạn đang trống!</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-update-option d-block d-md-flex justify-content-between">
                            <a href="?action=home" class="btn btn-secondary">Tiếp tục mua sắm</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 ml-auto">
                        <div class="cart-calculator-wrapper">
                            <h6>Tổng đơn hàng</h6>
                            <table class="table">
                                <tr>
                                    <td>Tổng tiền sản phẩm</td>
                                    <td><?= number_format($tongGioHang, 0, ',', '.') ?> đ</td>
                                </tr>
                                <tr>
                                    <td>Vận chuyển</td>
                                    <td>30.000 đ</td>
                                </tr>
                                <tr class="total">
                                    <td>Tổng thanh toán</td>
                                    <td class="total-amount"><?= number_format($tongGioHang + 30000, 0, ',', '.') ?> đ</td>
                                </tr>
                            </table>
                            <a href="?action=checkout" class="btn btn-primary d-block <?= $tongGioHang == 0 ? 'disabled' : '' ?>">Tiến hành thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(productId) {
            swal({
                title: "Chắc chắn xoá khỏi giỏ hàng?",
                text: "Sản phẩm sẽ bị xoá khỏi giỏ hàng của bạn!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = './app/function/cart/remove_product_in_cart.php?id=' + productId;
                } else {
                    swal("Sản phẩm chưa bị xoá khỏi giỏ hàng!");
                }
            });
        }

        function updateQuantity(productId, newQuantity) {
            if (newQuantity < 1) {
                swal("Số lượng tối thiểu là 1!");
                return;
            }
            fetch('./app/function/cart/update_product_quanlity_in_cart.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ productId, newQuantity }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    swal("Lỗi", data.message || "Có lỗi xảy ra khi cập nhật số lượng.", "error");
                }
            })
            .catch(error => swal("Lỗi", "Không thể cập nhật số lượng. Vui lòng thử lại!", "error"));
        }
    </script>
</body>
<?php include 'footer.php'; ?>
</html>
