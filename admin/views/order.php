<!-- sản phẩm  -->
<?php
require './views/header.php';
require './views/navbar.php';
require './views/sidebar.php'

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lí đơn hàng</h1>
        </div>
        <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div> -->
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <!-- <h3 class="card-title">Danh mục sản phẩm</h3> -->

            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Mã đơn</th>
                    <th>Tên người mua</th>
                    <th>Tổng tiền</th>
                    <th>Ngày giờ</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>

                  </tr>
                </thead>
                <tbody>
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <td><?= $order["order_code"] ?></td>
                        <td><?= $order["user_name"] ?></td>
                        <td><?= number_format($order["total_amount"]) ?></td>
                        <td><?= $order["date"] ?></td>
                        <td>
                            <span class="badge bg-<?= $order["status"] == "Processing"
                                                        ? "primary text-dark"
                                                        : ($order["status"] == "Delivered"
                                                            ? "success"
                                                            : "danger") ?>">
                                <?= $order["status"] ?>
                            </span>
                        </td>
                        <td>
                            <a href="?action=editOrder&id=<?= $order["id"] ?>" class="btn btn-warning">
                                <i class="bi bi-eye"></i> Chi tiết
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Footer  -->
<?php require './views/footer.php' ?>
<!-- End Footer  -->

<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>

</html>