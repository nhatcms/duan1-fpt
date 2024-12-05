
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
                    <h1>Quản lý tài khoản</h1>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Chỉnh sửa tài khoản</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="?action=updateUser&id=<?php echo $user['id']; ?>" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="user_id"> ID</label>
                                    <input type="text" class="form-control" id="user_id" name="id" value="<?php echo $user['id']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="username">Tên người dùng</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="realname">Họ tên</label>
                                    <input type="text" class="form-control" id="realname" name="realname" value="<?php echo $user['real_name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Số điện thoại</label>
                                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="<?php echo $user['phoneNumber']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="isActive">Trạng thái</label>
                                    <select class="form-control" id="isActive" name="isActive">
                                        <option value="1" <?php echo $user['isActive'] == 1 ? 'selected' : ''; ?>>Hoạt động</option>
                                        <option value="0" <?php echo $user['isActive'] == 0 ? 'selected' : ''; ?>>Bị cấm</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="password">Mật khẩu</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="repassword">Mật khẩu nhập lại</label>
                                    <input type="password" class="form-control" id="repassword" name="repassword">
                                </div>
                                <div class="form-group">
                                    <label for="role">Vai trò</label>
                                    <select class="form-control" id="role" name="role">
                                        <option value="1" <?php echo $user['role'] == 1 ? 'selected' : ''; ?>>Admin</option>
                                        <option value="3" <?php echo $user['role'] == 3 ? 'selected' : ''; ?>>User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary w-100" name="edit-user-btn">Lưu</button>
                            </div>
                        </form>

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

</body>

</html>