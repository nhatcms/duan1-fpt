<?php
$categories = CategoryModel::getAllCategories();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/fcb933068a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Bố cục thanh điều hướng */
        .nav-bar {
            background-color: #1e1e1e; /* Màu nền đen xám */
            padding: 10px 20px; /* Khoảng cách giữa các mục */
            display: flex;
            align-items: center; /* Căn giữa theo chiều dọc */
            justify-content: space-between; /* Chia đều các phần tử */
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        /* Logo */
        .logo {
            max-height: 40px;
        }

        /* Menu */
        .menu {
            display: flex;
            justify-content: center;
            flex: 1;
        }

        .menu-item {
            color: #ffffff; /* Màu chữ trắng */
            text-decoration: none;
            font-size: 16px;
            margin: 0 15px; /* Khoảng cách giữa các menu */
            padding: 5px;
        }

        .menu-item:hover {
            color: #4ca3ff; /* Màu xanh khi di chuột */
            border-bottom: 2px solid #4ca3ff; /* Thêm đường viền dưới khi hover */
        }

        /* Phần bên phải của thanh điều hướng (Login, Cart, Tìm kiếm) */
        .right-section {
            display: flex;
            align-items: center;
            gap: 20px; /* Khoảng cách giữa các mục */
            padding-right: 20px;
        }

        /* Các mục bên phải (login, cart, search) */
        .right-section a {
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
        }

        .right-section a:hover {
            color: #4ca3ff;
        }

        /* Biểu tượng giỏ hàng */
        .cart-icon {
            position: relative;
        }

        .cart-badge {
            position: absolute;
            top: -5px;
            right: -10px;
            background-color: red;
            color: white;
            font-size: 12px;
            padding: 2px 5px;
            border-radius: 50%;
        }

        /* Biểu tượng tìm kiếm */
        /* .search-form {
            display: flex;
            align-items: center;
        } */

        .search-form input[type="text"] {
            padding: 5px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 250px;
        }

        .search-form button {
            background-color: #4ca3ff;
            color: white;
            border: none;
            padding: 6px 15px;
            margin-left: 10px;
            border-radius: 5px;
        }

        .search-form button:hover {
            background-color: #3a8cc1;
        }

        /* Điều chỉnh các phần tử nhỏ khác */
        .cart-icon i, .fa-user, .fa-right-to-bracket, .fa-magnifying-glass {
            font-size: 20px;
        }
        .right-section {
        display: flex;
        align-items: center;
        gap: 30px; /* Tăng khoảng cách giữa các phần tử */
        /* padding-right: 20px; */
    }

    /* Thêm margin cho icons */
    .right-section i {
        margin: 0 8px; /* Thêm khoảng cách trái phải cho icons */
    }

    /* Điều chỉnh cart-icon */
    .cart-icon {
        margin-right: 15px; 
        padding: 5px; /* Thêm padding */
    }

    .right-section a {
        padding: 5px 10px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    </style>
</head>

<body>
    <div class="menu-container">
        <div class="nav-bar">
            <!-- Logo -->
            <a href="?action=home"><img src="assets/img/logo_1222.jpg" alt="Logo" class="logo"></a>
            <!-- Menu -->
            <nav class="menu">
                <?php
                foreach ($categories as $category) {
                    echo '<a href="?action=category&id=' . $category['id'] . '" class="menu-item">' . $category['cate_name'] . '</a>';
                }
                ?>
                <a href="?action=tintuc" class="menu-item">Tin tức</a>
                <!-- <a href="?action=about" class="menu-item">Giới thiệu</a> -->
            </nav>

            <!-- Search Form -->
            <form action="?action=search" class="search-form" method="post">
                <input type="text" id="search" name="keyword" placeholder="Nhập tên 1 sản phẩm..." required onkeypress="if(event.key === 'Enter'){ this.form.submit(); return false; }">
            </form>

            <!-- Right section (Login, Cart, etc.) -->
            <div class="right-section">
                <!-- Cart Icon -->
                <a href="?action=cart" class="cart-icon">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <span class="cart-badge">
                        <?php
                        // Kiểm tra nếu giỏ hàng có dữ liệu
                        $totalQuantity = 0;
                        if (isset($_SESSION['cart'])) {
                            $totalQuantity = count($_SESSION['cart']);
                        }
                        ?>
                        <?= $totalQuantity > 0 ? $totalQuantity : 0 ?>
                    </span>
                </a>

                <!-- Login or Logout -->
                <?php
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                    echo '<a href="?action=profile&id=' . $_SESSION['user_id'] . '"><i class="fa-solid fa-user"></i> </a>';
                    echo '<a href="?action=logout"><i class="fa-solid fa-right-to-bracket"></i> Logout</a>';
                } else {
                    echo '<a href="?action=login"><i class="fa-solid fa-user"></i> </a>';
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>
