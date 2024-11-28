
<?php if (isset($_SESSION['alert'])) : ?>
    <div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Thông báo',
                text: '<?php echo $_SESSION['alert']; ?>',
                confirmButtonText: 'OK'
            });
        </script>
    </div>
    <?php  unset($_SESSION['alert']); ?>
<?php endif; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/login.css?v=<?php echo time(); ?>">
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
    <title>SamCenter - Đăng nhập</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="login-container">
        <div class="login-banner">
            <img src="assets/img/Frame 2327.png" alt="login-banner" class="login-banner-img">
        </div>
        <div class="login-form">
            <h3 class="login-form-title">Đăng nhập hệ thống</h3>
            <div class="login-form-box">
                <form action="?action=login" method="post">
                    <!-- username and password fields +button-->
                    <label for="username" class="login-form-label">Username: </label><br>
                    <input type="text" name="username" id="username" placeholder="Nhập tên người dùng" required><br>
                    <label for="password" class="login-form-label">Mật khẩu: </label><br>
                    <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" required><br>
                    <div class="login-form-action-box">
                        <a href="?action=register" class="login-form-label">Đăng ký mới</a>
                        <a href="#" class="login-form-label forgotadw">Quên mật khẩu?</a>
                    </div>
                    <button type="submit" class="login-btn" name="login-btn">Hoàn tất</button>
                    <!-- forgot password -->
                    <!-- register -->
                </form>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>