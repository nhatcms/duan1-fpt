<!-- 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <title>Document</title> -->
    <!-- <style>
        .edit-cate-container {
            margin-top: 30px;
        }
    </style> -->
<!-- </head>

<body> -->
    <?php //require_once 'views/header.php'; ?>
    <!-- <div class="container edit-cate-container w-50">
        <h2>Edit Category</h2>
        <form action="?action=editCate&id=<?php echo $cate['id']; ?>" method="post">
            <div class="form-group">
                <label for="cate_name">Category ID</label>
                <input type="text" class="form-control" id="cate_name" name="id" value="<?php echo $cate['id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="cate_name">Category Name</label>
                <input type="text" class="form-control" id="cate_name" name="cate_name" value="<?php echo $cate['cate_name']; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="edit-cate-btn">Edit</button>
        </form>
</body> -->
<?php //require_once 'footer.php'; ?>
<!-- 
</html> -->


<!-- edit cate  -->
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
                    <h1>Quản lí danh mục sản phẩm</h1>
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
                <h3 class="card-title">Sửa danh mục</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="?action=editCate&id=<?php echo $cate['id']; ?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="cate_name">Category ID</label>
                    <input type="text" class="form-control" id="cate_name" name="id" value="<?php echo $cate['id']; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="cate_name">Category Name</label>
                    <input type="text" class="form-control" id="cate_name" name="cate_name" value="<?php echo $cate['cate_name']; ?>">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="edit-cate-btn">Edit</button>
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