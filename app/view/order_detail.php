<!-- chặn nếu reload page dưới 10s 1 lần trong vòng 3 lần liên tiếp -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php require_once 'header.php'; ?>

    <div class="container my-5">
        <h2 class="mb-4">Chi tiết đơn hàng: <?=$_GET['order_code'] ?></h2>

        <?php
        ?>

        <!-- Hiển thị thông tin khách hàng -->
        <div class="mb-4">
            <h4>Thông tin người đặt hàng</h4>
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label"><strong>Họ tên:</strong></label>
                    <input type="text" class="form-control" id="name" value="<?= htmlspecialchars($_SESSION['name']) ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label"><strong>Địa chỉ:</strong></label>
                    <input type="text" class="form-control" id="address" value="<?= htmlspecialchars($order['address']) ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label"><strong>Số điện thoại:</strong></label>
                    <input type="text" class="form-control" id="phone" value="<?= htmlspecialchars($_SESSION['phone']) ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="payment_method" class="form-label"><strong>Phương thức thanh toán:</strong></label>
                    <input type="text" class="form-control" id="payment_method" value="<?= htmlspecialchars($order['payment_method']) ?>" disabled>
                </div>
            </form>
        </div>

        <?php
        // Kiểm tra nếu không có chi tiết đơn hàng
        if (empty($order_details)): ?>
            <div class="alert alert-warning">Không tìm thấy chi tiết đơn hàng.</div>
        <?php else: ?>
            <!-- Bảng chi tiết đơn hàng -->
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Mã đơn</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th> <!-- Cột mới cho thành tiền -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_price = 0;
                    foreach ($order_details as $item):
                        $item_total = $item['quantity'] * $item['price']; // Tính thành tiền cho từng sản phẩm
                        $total_price += $item_total;
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($item['order_code']) ?></td>
                            <td><?= htmlspecialchars($item['name']) ?></td>
                            <td><?= htmlspecialchars($item['quantity']) ?></td>
                            <td><?= number_format($item['price'], 0, ',', '.') ?> đ</td>
                            <td><?= number_format($item_total, 0, ',', '.') ?> đ</td> <!-- Hiển thị thành tiền -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <?php
                    // Cộng thêm phí vận chuyển 30k
                    $shipping_fee = 30000;
                    $total_price_with_shipping = $total_price + $shipping_fee;
                    ?>
                    <tr>
                        <td colspan="4" class="text-end"><strong>Tổng tiền sản phẩm:</strong></td> <!-- Tổng tiền sản phẩm -->
                        <td class="text-end"><strong><?= number_format($total_price, 0, ',', '.') ?> đ</strong></td> <!-- Hiển thị tổng tiền sản phẩm -->
                    </tr>
                    <tr>
                        <td colspan="4" class="text-end"><strong>Phí vận chuyển:</strong></td>
                        <td class="text-end"><?= number_format($shipping_fee, 0, ',', '.') ?> đ</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-end"><strong>Tổng tiền:</strong></td>
                        <td class="text-end"><strong><?= number_format($total_price_with_shipping, 0, ',', '.') ?> đ</strong></td>
                    </tr>
                </tfoot>
            </table>
        <?php endif; ?>

        <!-- Nút quay lại -->
        <a href="?action=history" class="btn btn-secondary mt-3">Quay lại danh sách đơn hàng</a>
    </div>
</body>
<?php require_once 'footer.php'; ?>
</html>
