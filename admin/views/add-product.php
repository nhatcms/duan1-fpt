<!-- add cate  -->
<?php
require './views/header.php';
require './views/navbar.php';
require './views/sidebar.php';
require_once 'models/AlertModel.php';
if (!empty($errors)) {
    $alertModel = new AlertModel();
    foreach ($errors as $error) {
        $alertModel->showAlert('error', 'Lỗi', htmlspecialchars($error));
        //xoa thong bao loi
    }
}


?>
<style>
    .description-textarea {
        min-height: 300px !important;
        resize: vertical; /* Cho phép kéo dãn chiều cao */
    }
</style>
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
                            <h3 class="card-title">Thêm sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="?action=addProduct" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="product_name" class="form-label">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="product_name" name="name" 
                                           value="<?= htmlspecialchars($oldInput['name'] ?? '') ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="category" class="form-label">Danh mục</label>
                                    <select class="form-select" id="category" name="cate_id">
                                        <?php foreach ($cates as $cate) : ?>
                                            <option value="<?= $cate['id'] ?>" 
                                                    <?= (isset($oldInput['cate_id']) && $oldInput['cate_id'] == $cate['id']) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($cate['cate_name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Mô tả</label>
                                    <textarea class="form-control" id="description" name="description" required>
                                        <?= htmlspecialchars($oldInput['description'] ?? '') ?>
                                    </textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Giá</label>
                                    <input type="number" class="form-control" id="price" name="price" 
                                           value="<?= htmlspecialchars($oldInput['price'] ?? '') ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="list_price" class="form-label">Giá niêm yết</label>
                                    <input type="number" class="form-control" id="list_price" name="list_price" 
                                           value="<?= htmlspecialchars($oldInput['list_price'] ?? '') ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="isActive" class="form-label">Trạng thái</label>
                                    <select class="form-select" id="isActive" name="isActive">
                                        <option value="1" <?= (isset($oldInput['isActive']) && $oldInput['isActive'] == '1') ? 'selected' : '' ?>>
                                            Active
                                        </option>
                                        <option value="0" <?= (isset($oldInput['isActive']) && $oldInput['isActive'] == '0') ? 'selected' : '' ?>>
                                            Inactive
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="img" required accept="image/*">
                                </div>
                                <button type="submit" name="add-prod-btn" class="btn btn-primary">Add Product</button>
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
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>


</body>

</html>