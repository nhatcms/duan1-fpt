<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SamCenter - Đại lý ủy quyền SamSung tại Việt Nam</title>
    <style>
        /* Font face definitions */
        @font-face {
            font-family: "SSS";
            src: url(../font/samsung-sharp-sans/samsungsharpsans.otf);
            font-weight: normal;
        }

        @font-face {
            font-family: "SSSMedium";
            src: url(../font/samsung-sharp-sans/samsungsharpsans-medium.otf);
            font-weight: medium;
        }

        @font-face {
            font-family: "SSSBold";
            src: url(../font/samsung-sharp-sans/samsungsharpsans-bold.otf);
            font-weight: bold;
        }

        /* Global styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "SSS", sans-serif;
            background-color: #F5F5F5;
            line-height: 1.6; /* Tăng khoảng cách dòng */
            color: #333; /* Màu chữ tối hơn để dễ đọc */
        }

        .main-container {
            display: block;
            align-items: center;
            justify-content: center;
            /* width: 100%; */
            margin: 20px auto;
            max-width: 1200px;
            }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 40px;
        }

        .product-card-container {
            display: flex;
            flex-direction: column;
            width: 100%;
            margin-bottom: 40px;
            background-color: #F7F7F7;
            border-radius: 10px;
            padding: 20px;
        }

        .product-card-container-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            /* border-bottom: solid 1px black; */
            margin-bottom: 20px;
        }

        .product-card-container-header-title {
            font-family: "SSSBold", sans-serif;
            font-size: 24px;
            font-weight: 700;
            color: black;
            text-decoration: none;
        }

        .product-card-container-header-title::before {
            content: "";
            display: block;
            width: 100%;
            height: 2px;
            background-color: black;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .product-card-container-header-title:hover {
            text-decoration: none;
            color: black;
        }

        .product-card-container-header-button {
            font-family: "SSSBold", sans-serif;
            font-size: 12px;
            font-weight: 700;
            color: black;
            text-decoration: none;
        }

        .product-card-container-header-button:hover {
            text-decoration: underline;
            color: black;
        }

        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .product-card {
            display: flex;
            flex-direction: column;
            width: calc(25% - 20px);
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .product-card img {
            width: 100%;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .product-card-title {
            font-family: "SSSBold", sans-serif;
            font-size: 18px;
            font-weight: 700;
            color: black;
            text-align: center;
            margin-bottom: 10px;
        }

        .product-card-price {
            font-family: "SSSMedium", sans-serif;
            font-size: 16px;
            font-weight: 500;
            color: black;
            text-align: center;
            margin-bottom: 10px;
        }

        .product-card-button {
            font-family: "SSSBold", sans-serif;
            font-size: 14px;
            font-weight: bold;
            color: white;
            background-color: black;
            padding: 10px;
            text-align: center;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            width: 50%;
            margin: 0 auto;
        }

        .product-card-button:hover {
            background-color: #3b98ef;
        }

        /* Media Queries */
        @media (max-width: 1200px) {
            .product-card {
                width: 45%;
            }
        }

        @media (max-width: 768px) {
            .product-card {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .product-card-container {
                padding: 10px;
            }

            .product-card {
                padding: 10px;
            }

            .product-card-title {
                font-size: 16px;
            }

            .product-card-price {
                font-size: 14px;
            }

            .product-card-button {
                font-size: 12px;
                width: 70%;
            }
        }
    </style>
</head>
<?php
include 'header.php';
?>

<body>
    <div class="main-container">
        <h3 style="margin-left: 20px;border-bottom: 1px solid black;"> <?php //check isset, set default
                                    echo 'Kết quả cho ' . (isset($_POST['keyword']) ? $_POST['keyword'] : 'Samsung Galaxy'); ?>:</h3>
        <div class="product-container">
            <div class="product-card-container">
                <?php if (empty($products)) : ?>
                    <p>Lỗi: Không có sản phẩm phù hợp với từ khóa bạn nhập.</p>
                <?php else : ?>
                    <div class="product-card-container-header">
                    </div>
                    <div class="product-grid">
                        <?php foreach ($products as $index => $product) : ?>
                            <div class="product-card">
                                <a href="?action=product&id=<?php echo $product['id']; ?>" class="product-card-img">
                                    <img src="assets/img/<?php echo htmlspecialchars($product['img']) ?? ''; ?>" alt="Product imgs" width="100%">
                                </a>
                                <a href="?action=product&id=<?php echo $product['id']; ?>" class="product-card-title">
                                    <?php echo htmlspecialchars($product['name'] ?? ''); ?>
                                </a>
                                <a href="?action=product&id=<?php echo $product['id']; ?>" class="product-card-price">
                                    <?php echo number_format($product['price'] ?? 0, 0, ',', '.'); ?>đ
                                </a>
                                <a href="?action=product&id=<?php echo $product['id']; ?>" class="product-card-button">
                                    Mua Ngay
                                </a>
                            </div>
                            <?php if (($index + 1) % 4 == 0) : ?>
                                <div class="clearfix"></div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- Nút back to top -->
        <!-- <a href="#" class="back-to-top"><i class="fas fa-chevron-up"></i></a> -->
    </div>
    <!-- Các scripts -->
    <script src="assets/scripts/slide.js?v<?php echo time(); ?>"></script>
    <script src="//code.tidio.co/tqqeu2ypalkjhct9bgns6wxlalcpizwi.js" async></script>
</body>
<?php
include 'footer.php';
?>

</html>