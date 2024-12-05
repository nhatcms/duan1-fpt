


<!-- sản phẩm  -->
<?php
require './views/header.php';
require './views/navbar.php';
require './views/sidebar.php';
if (isset($_SESSION['alert'])) {
    require_once "models/AlertModel.php";
    $alert = new AlertModel();
    if ($_SESSION['isSuccess']) {
        $alert->showAlert('success', 'Thành công', $_SESSION['alert']);
    } else {
        $alert->showAlert('error', 'Lỗi', $_SESSION['alert']);
    }
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
                    <h1>Quản lí sản phẩm</h1>
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
                             <a href="?action=addProduct">
                                <button class="btn btn-success">Thêm sản phẩm</button>
                             </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Danh mục</th>
                                        <th>Giá bán</th>
                                        <th>Giá niêm yết</th>
                                        <th>Trạng thái</th>
                                        <th>Hình ảnh</th>
                                        <th>Hành động</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $product) : ?>
                                        <tr id="product-<?php echo $product['id']; ?>">
                                            <td><?php echo $product['id']; ?></td>
                                            <td><?php echo htmlspecialchars($product['name']); ?></td>
                                            <td><?php echo htmlspecialchars($product['cate_name']); ?></td>
                                            <td><?php echo $product['price']; ?></td>
                                            <td><?php echo $product['list_price']; ?></td>
                                            <td>
                                                <span class="badge <?php echo $product['isActive'] == 1 ? 'bg-success' : 'bg-danger'; ?>">
                                                    <?php echo $product['isActive'] == 1 ? 'Đang bán' : 'Ngừng bán'; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <img src="../assets/img/<?php echo $product['img']; ?>" alt="Hình sản phẩm" class="product-img" width="80px">
                                            </td>
                                            <td>
                                                <a href="?action=editProduct&id=<?php echo $product['id']; ?>" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil"></i> Chỉnh sửa
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>      </table>
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
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
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