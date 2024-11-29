
<?php
require './views/header.php';
require './views/navbar.php';
require './views/sidebar.php';
// Alert handling
if (isset($_SESSION['alert'])) {
    require_once "models/AlertModel.php";
    $alert = new AlertModel();
    if ($_SESSION['isSuccess']) {
        $alert->showAlert('success', 'Thêm xong', $_SESSION['alert']);
    } else {
        $alert->showAlert('error', 'Chưa thêm', $_SESSION['alert']);
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
                    <h1>Quản lí tài khoản</h1>
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
                             <a href="?action=addUser">
                                <button class="btn btn-success">Thêm tài khoản</button>
                             </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Ảnh đại diện</th>

                                        <th>Tên tài khoản</th>
                                        <th>Họ và tên</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Vai trò</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user): ?>
                                        <tr id="user-<?php echo $user['id']; ?>">
                                            <td>
                                                <img src="../assets/img/<?php echo $user['imgPath']; ?>" alt="avatar" width="80">
                                            </td>
                                            <td><?php echo htmlspecialchars($user['username']); ?></td>
                                            <td><?php echo htmlspecialchars($user['real_name']); ?></td>
                                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                                            <td><?php echo htmlspecialchars($user['phoneNumber']); ?></td>
                                            <td>
                                                <?php 
                                                    $roleClass = $user['role'] == 1 ? 'bg-danger' : ($user['role'] == 2 ? 'bg-primary' : 'bg-success');
                                                    $roleText = $user['role'] == 1 ? 'Admin' : ($user['role'] == 2 ? 'Editor' : 'User');
                                                ?>
                                                <span class="badge <?php echo $roleClass; ?>"><?php echo $roleText; ?></span>
                                            </td>
                                            <td>
                                                <?php 
                                                    $statusClass = $user['isActive'] == 1 ? 'bg-success' : 'bg-secondary';
                                                    $statusText = $user['isActive'] == 1 ? 'Active' : 'Inactive';
                                                ?>
                                                <span class="badge <?php echo $statusClass; ?>"><?php echo $statusText; ?></span>
                                            </td>
                                            <td>
                                                <a href="?action=updateUser&id=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil"></i> Chi tiết
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