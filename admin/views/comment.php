


<!-- sản phẩm  -->
<?php
require './views/header.php';
require './views/navbar.php';
require './views/sidebar.php'

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php
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
    ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lí đánh giá</h1>
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
                                        <th>Product name</th>
                                        <th>User</th>
                                        <th>Comment</th>
                                        <th>Active</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if (!empty($comments)) {
                                    foreach ($comments as $comment) {
                                        echo "<tr>";
                                        echo "<td>{$comment['name']}</td>";
                                        echo "<td>{$comment['user_name']}</td>";
                                        echo "<td>{$comment['content']}</td>";
                                        // post user
                                        echo "<td>";
                                        // view button
                                        echo "<a href='?action=editProduct&id={$comment['product_id']}' class='btn btn-success btn-sm'  target='_blank'>Xem SP</a>";
                                        echo "<a href='?action=deleteComment&id={$comment['id']}' class='btn btn-danger btn-sm ms-1 delete-btn'>Delete</a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>No comments available.</td></tr>";
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
//sweet alert cdn 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



<script>
        const deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.href;
                Swal.fire({
                    title: 'Chắc chắn xoá?',
                    text: "Hành động này không thể được hoàn tác!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đúng, xoá'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });
    </script>
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