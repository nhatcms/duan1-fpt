
<?php //require_once 'footer.php'; ?>
<!-- 
</html> -->


<!-- edit cate  -->
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit order</h1>
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
              <div class="card-header">
                
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="?action=editOrder" method="post">
            <input type="hidden" name="id" value="<?php echo $order['id']; ?>">

            <div class="form-group mb-3">
                <label for="order_code">Mã đơn</label>
                <input type="text" id="order_code" name="order_code" 
                       value="<?php echo $order['order_code']; ?>" readonly
                       class="form-control" placeholder="Enter Order Code">
            </div>

            <div class="form-group mb-3">
                <label for="user_name">Tên người đặt</label>
                <input type="text" id="user_name" name="user_name" 
                       value="<?php echo $order['user_name']; ?>" 
                       class="form-control" placeholder="Enter User Name" readonly>
            </div>

            <input type="hidden" id="user_id" name="user_id" value="<?php echo $order['user_id']; ?>" readonly>

            <div class="form-group mb-3">
                <label for="date">Ngày đặt hàng</label>
                <input type="text" id="date" name="date" 
                       value="<?php echo $order['date']; ?>" 
                       class="form-control" placeholder="Enter Date" readonly>
            </div>

            <div class="form-group mb-3">
                <label for="total_amount">Tổng tiền</label>
                <input type="text" id="total_amount" name="total_amount" 
                       value="<?php echo number_format($order['total_amount']); ?>₫" 
                       class="form-control" placeholder="Enter Total Amount" readonly>
            </div>

            <div class="form-group mb-3">
                <label for="status">Trạng thái</label>
                <select id="status" name="status" class="form-select" required>
            <?php if ($order['status'] == 'Delivered') : ?>
                <option value="Delivered" selected>Delivered</option>
            <?php else : ?>
                <option value="Pending" 
                    <?php echo $order['status'] == 'Pending' ? 'selected' : ''; ?>>
                    Pending
                </option>
                <option value="Processing" 
                    <?php echo $order['status'] == 'Processing' ? 'selected' : ''; ?>>
                    Processing
                </option>

                <option value="Delivered" 
                    <?php echo $order['status'] == 'Delivered' ? 'selected' : ''; ?>>
                    Delivered
                </option>
                <option value="Cancelled" 
                    <?php echo $order['status'] == 'Cancelled' ? 'selected' : ''; ?>>
                    Cancelled
                </option>

            <?php endif; ?>
        </select>

            </div>

            <div class="form-group mb-3">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" 
                value="<?php echo htmlspecialchars($order['address']); ?>" 
                class="form-control" placeholder="Enter Address" 
                <?php echo $order['status'] == 'Delivered' ? 'readonly' : ''; ?> required>
        </div>
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
<!-- Footer  -->
<?php require './views/footer.php' ?>
<!-- End Footer  -->

<!-- Page specific script -->

</body>

</html>