
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
                    <h1>Thêm tài khoản</h1>
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
                            <h3 class="card-title">Thêm tài khoản</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="?action=addUser" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="username" class="form-label">Username:</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="realname" class="form-label">Real Name:</label>
                                    <input type="text" class="form-control" id="realname" name="realname" required>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="phoneNumber" class="form-label">Phone Number:</label>
                                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="form-label">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password" class="form-label">Confirm Password:</label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                </div>
                                <div class="form-group">
                                    <label for="role" class="form-label">Role:</label>
                                    <select class="form-control" id="role" name="role" required>
                                        <option value="1">Admin</option>
                                        <option value="2">Editor</option>
                                        <option value="3" selected>User</option>
                                    </select>
                                </div>
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="isActive" name="isActive" value="1" checked>
                                    <label class="form-check-label" for="isActive">Is Active</label>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary w-100">Save</button>
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