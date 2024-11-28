<?php if (isset($_SESSION['isSuccess'])) : ?>
    <div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                icon: '<?php echo isset($_SESSION['isSuccess']) && $_SESSION['isSuccess'] ? "success" : "warning"; ?>',
                title: 'Thông báo',
                text: '<?php echo $_SESSION['alert']; ?>',
                confirmButtonText: 'OK'
            }).then(() => {
                // Điều hướng hoặc thực hiện lệnh PHP thông qua AJAX hoặc chuyển hướng
                <?php if ($_SESSION['isSuccess']) : ?>
                    window.location.href = '?action=login';
                <?php endif; ?>
            });
        </script>
    </div>
<?php 
unset($_SESSION['alert'], $_SESSION['isSuccess']); 
?>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/login.css?v=<?php echo time(); ?>">
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
    <title>SamCenter - Đăng ký</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="login-container">
        <div class="login-banner">
            <img src="assets/img/Frame 2327.png" alt="login-banner" class="login-banner-img">
        </div>
        <div class="login-form">
            <h3 class="login-form-title">Đăng ký thành viên</h3>
            <div class="login-form-box">
                <form action="?action=register" method="post">
                    <!-- username and password fields +button-->
                    <label for="email" class="login-form-label">E-mail: </label><br>
                    <input type="email" name="email" id="username" placeholder="Email liên lạc" required><br>
                    <label for="phone" class="login-form-label">Số điện thoại: </label><br>
                    <input type="number" name="phone" id="username" placeholder="Số điện thoại cá nhân" required><br>
                    <label for="username" class="login-form-label">Username: </label><br>
                    <input type="text" name="username" id="username" placeholder="Tên người dùng" required><br>
                    <label for="realname" class="login-form-label">Họ và tên: </label><br>
                    <input type="text" name="realname" id="realname" placeholder="Nhập họ tên thật" required><br>
                    <label for="password" class="login-form-label">Mật khẩu: </label><br>
                    <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" required><br>
                    <label for="repassword" class="login-form-label">Mật khẩu nhập lại: </label><br>
                    <input type="password" name="repassword" id="password" placeholder="Nhập lại mật khẩu" required><br>
                    <div class="login-form-action-box">
                        <a href="?action=login" class="login-form-label">Đã có tài khoản?</a>
                        <a href="#" class="login-form-label forgotadw">Quên mật khẩu?</a>
                    </div>
                    <button type="submit" class="reg-btn" name="reg-btn">Hoàn tất</button>

                </form>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>