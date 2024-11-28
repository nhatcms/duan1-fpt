
<?php
require './views/header.php';
require './views/navbar.php';
require './views/sidebar.php';





?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa sản phẩm</h1>
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
              <?php
                if (isset($_SESSION["isSuccess"]) && $_SESSION["isSuccess"] === FALSE) {
                    require_once './models/AlertModel.php';
                    $alertModel = new AlertModel();
                    $alertModel->showAlert('error', 'Lỗi', htmlspecialchars($_SESSION["alert"]));
                    unset($_SESSION["isSuccess"]);
                    unset($_SESSION["alert"]);
                }elseif (isset($_SESSION["isSuccess"]) && $_SESSION["isSuccess"] === TRUE) {
                    require_once './models/AlertModel.php';
                    $alertModel = new AlertModel();
                    $alertModel->showAlert('success', 'Thành công', htmlspecialchars($_SESSION["alert"]));
                    unset($_SESSION["isSuccess"]);
                    unset($_SESSION["alert"]);
                }
                ?>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="?action=editProduct&id=<?php echo $product["id"]; ?>" method="POST" enctype="multipart/form-data">
            <!-- hidden id -->
            <input type="hidden" name="id" value="<?php echo $product["id"]; ?>">

            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $product["name"]; ?>" required>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Danh mục</label>
                <select class="form-select" id="category" name="cate_id" required>
                    <?php foreach ($cates as $cate): ?>
                        <option value="<?php echo $cate["id"]; ?>" <?php echo $cate["id"] == $product["cate_id"] ? "selected" : ""; ?>>
                            <?php echo htmlspecialchars($cate["cate_name"]); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="text" class="form-control" id="price" name="price" value="<?php echo number_format($product["price"], 0, '.', ','); ?>" required>
            </div>

            <div class="mb-3">
                <label for="list_price" class="form-label">Giá niêm yết</label>
                <input type="text" class="form-control" id="list_price" name="list_price" value="<?php echo number_format($product["list_price"], 0, '.', ','); ?>">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?php echo htmlspecialchars($product["description"]); ?></textarea>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Trạng thái</label>
                <select class="form-select" id="status" name="isActive">
                    <option value="1" <?php echo $product["isActive"] == 1 ? "selected" : ""; ?>>Active</option>
                    <option value="0" <?php echo $product["isActive"] == 0 ? "selected" : ""; ?>>Inactive</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="img" class="form-label">Ảnh (giữ nguyên thì không cần up)</label>
                <input type="file" class="form-control" id="imgs" name="img" accept="image/*">
                <?php if (!empty($product["img"])): ?>
                    <img src="../assets/img/<?php echo htmlspecialchars($product["img"]); ?>" alt="Ảnh sản phẩm" class="img-thumbnail mt-2" width="100">
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary" name="edit-btn">Cập nhật</button>
        </form>

        <script>
            document.getElementById('price').addEventListener('input', function (e) {
                this.value = this.value.replace(/[^0-9]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            });

            document.getElementById('list_price').addEventListener('input', function (e) {
                this.value = this.value.replace(/[^0-9]/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            });

            document.querySelector('form').addEventListener('submit', function () {
                let priceInput = document.getElementById('price');
                let listPriceInput = document.getElementById('list_price');
                priceInput.value = priceInput.value.replace(/,/g, '');
                listPriceInput.value = listPriceInput.value.replace(/,/g, '');
            });

        </script>

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