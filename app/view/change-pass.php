<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/fcb933068a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Đổi Mật Khẩu</title>
    <style>
        body {
            margin-top: 20px;
            background-color: #f2f6fc;
            color: #69707a;
            margin: 150px 0px 300px 0px;
        }
        .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
            margin-bottom: 250px;
            
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
            margin: 0 1rem;
        }
        .rules-card {
            background-color: #fff;
            border: 1px solid #c5ccd6;
            border-radius: 0.35rem;
            padding: 15px;
            box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
        }
        .rules-card ul {
            list-style-type: none;
            padding: 0;
        }
        .rules-card ul li {
            margin-bottom: 10px;
            padding-left: 20px;
            position: relative;
        }
        .rules-card ul li::before {
            content: "\f00c";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            color: #28a745;
            position: absolute;
            left: 0;
        }
        .rules-card h5 {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<?php require_once 'header.php'; ?>
<div class="container-xl px-4 mt-4">
    <nav class="nav nav-borders">
        <a class="nav-link ms-0" href="?action=profile&id=<?= $_SESSION['user_id'] ?>">Trang cá nhân</a>
        <a class="nav-link active" href="?action=changePass&id=<?= $_SESSION['user_id'] ?>">Bảo mật</a>
        <a class="nav-link" href="?action=history&id=<?= $_SESSION['user_id'] ?>">Xem đơn hàng</a>
    </nav>
    <div class="row mt-4">
        <!-- Quy tắc đặt mật khẩu -->
        <div class="col-md-4">
            <div class="rules-card">
                <h5>Quy tắc đặt mật khẩu</h5>
                <ul>
                    <li>Ít nhất 8 ký tự.</li>
                    <li>Chứa ít nhất một chữ cái viết hoa.</li>
                    <li>Chứa ít nhất một số.</li>
                    <li>Chứa một ký tự đặc biệt (@, #, $, v.v.).</li>
                </ul>
                <!-- 1 cau slogan an toan thong tin -->
                <p class="text-muted small">"Mật khẩu của bạn là lớp bảo vệ cuối cùng của tài khoản của bạn. Hãy chắc chắn rằng bạn đã chọn một mật khẩu mạnh mẽ và không chia sẻ nó với người khác."</p>
            </div>
        
        </div>
        <!-- Form đổi mật khẩu -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Đổi Mật Khẩu</div>
                <div class="card-body">
                    <form action="?action=changePass&id=<?= $_SESSION['user_id'] ?>" method="post">
                        <!-- Mật khẩu mới -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật khẩu mới</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Nhập mật khẩu mới" required>
                        </div>
                        <!-- Nhập lại mật khẩu -->
                        <div class="mb-3">
                            <label for="repassword" class="form-label">Nhập lại mật khẩu mới</label>
                            <input type="password" id="repassword" name="repassword" class="form-control" placeholder="Nhập lại mật khẩu" required>
                        </div>
                        <!-- Lưu thay đổi -->
                        <button type="submit" class="btn btn-dark w-100" name="change-password-btn">Đổi mật khẩu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'footer.php'; ?>
</body>
</html>
