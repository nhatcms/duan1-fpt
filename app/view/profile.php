<?php


if($_GET['id'] != $_SESSION['user_id']){
    $id=$_SESSION['user_id'];
    header('Location: ?action=profile&id='.$id);
}?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/fcb933068a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Profile Edit</title>
    <style>
        body {
            margin-top: 20px;
            background-color: #f2f6fc;
            color: #69707a;
        }
        .img-account-profile {
            height: 10rem;
        }
        .rounded-circle {
            border-radius: 50% !important;
        }
        .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
        }
        .card .card-header {
            font-weight: 500;
        }
        .form-control {
            border: 1px solid #c5ccd6;
            border-radius: 0.35rem;
        }
        .nav-borders .nav-link.active {
                color: #0061f2;
                border-bottom-color: #0061f2;
            }
            .nav-borders .nav-link {
                color: #69707a;
                border-bottom-width: 0.125rem;
                border-bottom-style: solid;
                border-bottom-color: transparent;
                padding-top: 0.5rem;
                padding-bottom: 0.5rem;
                padding-left: 0;
                padding-right: 0;
                margin-left: 1rem;
                margin-right: 1rem;
            }
    </style>
</head>
<body>
<?php require_once 'header.php'; ?>
<div class="container-xl px-4 mt-4">
<nav class="nav nav-borders">
        <a class="nav-link ms-0 active" href="?action=profile">Trang cá nhân</a>
        <a class="nav-link" href="?action=changePass" >Bảo mật</a>
        <a class="nav-link" href="?action=history" >Xem đơn hàng</a>
    </nav>
    <div class="row">
    <form action="?action=profile&id=<?=$user['id']?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <!-- Ảnh đại diện -->
        <div class="col-xl-4">
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Ảnh đại diện</div>
                <div class="card-body text-center">
                    <img class="img-account-profile rounded-circle mb-2" src="./assets/img/<?php echo $user['imgPath']?>" alt="Ảnh đại diện">
                    <div class="small font-italic text-muted mb-4">MobileLand's member</div>
                    <input class="form-control" type="file" name="profile_image" accept="image/*">
                </div>
            </div>
        </div>
        <!-- Thông tin tài khoản -->
        <div class="col-xl-8">
            <div class="card mb-4">
                <div class="card-header">Thông tin tài khoản</div>
                <div class="card-body">
                    <!-- Tên thật -->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputRealName">Tên thật</label>
                        <input class="form-control" id="inputRealName" name="realname" type="text" value="<?= $user['real_name']?>" placeholder="Nhập tên thật mới" required>
                    </div>
                    <!-- Tên người dùng -->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputUsername">Tên người dùng</label>
                        <input class="form-control" id="inputUsername" name="username" type="text" value="<?= $user['username']?>" placeholder="Nhập tên người dùng mới" required>
                    </div>
                    <!-- Email -->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputEmailAddress">Địa chỉ email</label>
                        <input class="form-control" id="inputEmailAddress" name="email" type="email" value="<?= $user['email']?>" placeholder="Nhập email mới" required>
                    </div>
                    <!-- Số điện thoại -->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputPhone">Số điện thoại</label>
                        <input class="form-control" id="inputPhone" name="phone" type="tel" placeholder="Nhập số điện thoại" value="<?= $user['phoneNumber']?>" required>
                    </div>
                    <!-- Lưu thay đổi -->
                    <button class="btn btn-dark" type="submit" name="update-btn">Lưu thay đổi</button>
                </div>
            </div>
        </div>
    </div>
</form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'footer.php'; ?>

</html>

