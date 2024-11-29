<?php
require './views/header.php';
require './views/navbar.php';
require './views/sidebar.php';
require_once "./models/AlertModel.php";
$alert = new AlertModel();

if ($order['status'] == 'Delivered') {
    $alert->showAlert('warning', 'Thất bại', 'Không thể thay đổi đơn hàng đã hoàn thành.');
}

if (isset($_SESSION['isSuccess']) && isset($_SESSION['alert'])) {
    $alert->showAlert('success', 'Hoàn thành', $_SESSION['alert']);
    unset($_SESSION['alert']);
    unset($_SESSION['isSuccess']);
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Order</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header"></div>
                        <!-- /.card-header -->

                        <!-- form start -->
                        <form action="?action=editOrder" method="post">
                            <input type="hidden" name="id" value="<?php echo $order['id']; ?>">

                            <!-- Order Code -->
                            <div class="form-group mb-3">
                                <label for="order_code">Mã đơn</label>
                                <input type="text" id="order_code" name="order_code" value="<?php echo $order['order_code']; ?>" readonly class="form-control" placeholder="Enter Order Code">
                            </div>

                            <!-- User Name -->
                            <div class="form-group mb-3">
                                <label for="user_name">Tên người đặt</label>
                                <input type="text" id="user_name" name="user_name" value="<?php echo $order['user_name']; ?>" class="form-control" placeholder="Enter User Name" readonly>
                            </div>

                            <input type="hidden" id="user_id" name="user_id" value="<?php echo $order['user_id']; ?>" readonly>

                            <!-- Date -->
                            <div class="form-group mb-3">
                                <label for="date">Ngày đặt hàng</label>
                                <input type="text" id="date" name="date" value="<?php echo $order['date']; ?>" class="form-control" placeholder="Enter Date" readonly>
                            </div>

                            <!-- Total Amount -->
                            <div class="form-group mb-3">
                                <label for="total_amount">Tổng tiền</label>
                                <input type="text" id="total_amount" name="total_amount" value="<?php echo number_format($order['total_amount']); ?>₫" class="form-control" placeholder="Enter Total Amount" readonly>
                            </div>

                            <!-- Order Status -->
                            <div class="form-group mb-3">
                                <label for="status">Trạng thái</label>
                                <select id="status" name="status" class="form-select" required>
                                    <?php if ($order['status'] == 'Delivered') : ?>
                                        <option value="Delivered" selected>Delivered</option>
                                    <?php else : ?>
                                        <option value="Pending" <?php echo $order['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                                        <option value="Processing" <?php echo $order['status'] == 'Processing' ? 'selected' : ''; ?>>Processing</option>
                                        <option value="Delivered" <?php echo $order['status'] == 'Delivered' ? 'selected' : ''; ?>>Delivered</option>
                                        <option value="Cancelled" <?php echo $order['status'] == 'Cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                                    <?php endif; ?>
                                </select>
                            </div>

                            <!-- Address -->
                            <div class="form-group mb-3">
                                <label for="address">Địa chỉ</label>
                                <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($order['address']); ?>" class="form-control" placeholder="Enter Address" <?php echo $order['status'] == 'Delivered' ? 'readonly' : ''; ?> required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="payment_method">Phương thức thanh toán</label>
                                <input type="text" id="payment_method" name="payment_method" value="<?php echo htmlspecialchars($order['payment_method']); ?>" class="form-control" readonly required>
                            </div>


                            <!-- Order Items Table -->
                            <div class="form-group">
                                <h4>Chi tiết đơn hàng</h4>
                                <table class="table table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Assuming $order_details is an array of order items
                                        foreach ($order_details as $item) :
                                            $item_total = $item['quantity'] * $item['price'];
                                        ?>
                                            <tr>
                                                <td><?= $item['name'] ?></td>
                                                <td><?= $item['quantity'] ?></td>
                                                <td><?= number_format($item['price'], 0, ',', '.') ?> đ</td>
                                                <td><?= number_format($item_total, 0, ',', '.') ?> đ</td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group">
                                <table class="table table-borderless">
                                    <tr>
                                        <td><strong>Tổng tiền sản phẩm:</strong></td>
                                        <td><strong><?= number_format($order['total_amount'], 0, ',', '.') ?> đ</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Phí vận chuyển:</strong></td>
                                        <td><strong>30.000 đ</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tổng tiền:</strong></td>
                                        <td><strong><?= number_format($order['total_amount'] + 30000, 0, ',', '.') ?> đ</strong></td>
                                    </tr>
                                </table>
                            </div>

                            <!-- Buttons -->
                            <?php if ($order['status'] == 'Delivered'): ?>
                                <a href="?action=order" class="btn btn-secondary">Quay về</a>
                            <?php else: ?>
                                <button type="submit" class="btn btn-primary" name="update-btn">Cập nhật</button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php require './views/footer.php' ?>
<!-- End Footer -->
</body>
</html>
