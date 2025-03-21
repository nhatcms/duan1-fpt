
<?php
require './views/header.php';
require './views/navbar.php';
require './views/sidebar.php';

if (isset($_SESSION['alert'])) {
    require_once "models/AlertModel.php";
    $alert = new AlertModel();
   if(isset($_SESSION['isSuccess'])){
       $alert->showAlert('success', 'Hoàn thành', $_SESSION['alert']);
       unset($_SESSION['isSuccess']);
    }else{
        $alert->showAlert('error', 'Thất bại', $_SESSION['alert']);
    }
    unset($_SESSION['alert']);
}
//import https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js by php

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
                    <div class="card">
                        <div class="card-header">
                            <!-- <h3 class="card-title">Danh mục sản phẩm</h3> -->
                             <a href="?action=addCate">
                                <button class="btn btn-success">Thêm danh mục</button>
                             </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên danh mục</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($cates)) {
                                        foreach ($cates as $cate) {
                                            $randomId = uniqid('category-');
                                            echo "<tr id='{$randomId}'>";
                                            echo "<td>{$cate['id']}</td>";
                                            echo "<td>{$cate['cate_name']}</td>";
                                            echo "<td>";
                                            // view button
                                            // echo "<a href=../?action=category&id={$cate['id']} class='btn btn-success btn-sm custom-btn'>View</a>";
                                            echo "<a href=?action=editCate&id={$cate['id']} class='btn btn-info btn-sm custom-btn'>Sửa</a>";
                                            echo "<button class='btn btn-danger btn-sm custom-btn' onclick='deleteCate({$cate['id']}, \"{$randomId}\")'>Xoá</button>";
                                            echo "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>No available category here.</td></tr>";
                                    }
                                    ?>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
<script>
    //import https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js

        function deleteCate(id, rowId) {
            Swal.fire({
                title: 'Chắc chắn xoá?',
                text: "Hành động sẽ không thể được hoàn tác!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#008000',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Huỷ',
                confirmButtonText: 'Đúng, xoá'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`?action=deleteCate&id=${id}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                Swal.fire(
                                    'Deleted!',
                                    data.message,
                                    'success'
                                );
                                document.getElementById(rowId).remove();
                            } else {
                                Swal.fire(
                                    'Error!',
                                    data.message,
                                    'error'
                                );
                            }
                        });
                }
            });
        }
    </script>
</body>

</html>