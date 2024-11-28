<?php
$products = ProductModel::getProductByCategory($id);
?>
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

/* Header banner styles */
.banner-box {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 40px;
}

.banner {
    object-fit: cover;
    display: block;
    width: 100%;
    border-radius: 8px; /* Bo góc hình ảnh */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Product Container */
.product-container {
    /* margin-top: 40px; */
       /* background-color: red; */
       height: auto;
            color: white;
            text-align: center;
            padding: 20px;
            width: 100%;
            /* margin-left: 250px; */
}

.product-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.product-card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    width: calc(25% - 20px);
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product-card:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
}

.product-card img {
    width: 100%;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 15px;
}

.product-card-title {
    font-family: "SSSBold", sans-serif;
    font-size: 18px;
    font-weight: 700;
    color: #000;
    text-align: center;
    margin-bottom: 10px;
    text-decoration: none;
}

.product-card-title:hover {
    color: #3b98ef;
}

.product-card-price {
    font-family: "SSSMedium", sans-serif;
    font-size: 16px;
    color: #000;
    text-align: center;
    margin-bottom: 10px;
}

.product-card-button {
    font-family: "SSSBold", sans-serif;
    font-size: 14px;
    color: #fff;
    background-color: #000;
    padding: 10px;
    text-align: center;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    margin: 0 auto;
    transition: background-color 0.3s ease;
}

.product-card-button:hover {
    background-color: #3b98ef;
}

/* Responsive Adjustments */
@media (max-width: 1200px) {
    .product-card {
        width: 45%;
    }

    .fixed-banner-box {
        width: 100%;
        float: none;
    }
}

@media (max-width: 768px) {
    .product-card {
        width: 100%;
    }

    .product-grid {
        gap: 10px;
    }
}

@media (max-width: 480px) {
    .product-card-container {
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
        width: 80%;
    }
    
}

    </style>
</head>
<?php
include 'header.php';
?>

<body>
    <div class="main-container">
    

        <h3 style="margin-left: 20px;border-bottom: 1px solid black;"><?php echo $cateName;?></h3>
        <div class="product-container">
            <div class="product-card-container">
                <?php if (empty($products)) : ?>
                    <p>Không có sản phẩm nào trong danh mục bạn yêu cầu!</p>
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
    </div>
    <!-- Các scripts -->
    <script src="assets/scripts/slide.js?v<?php echo time(); ?>"></script>
    <script src="//code.tidio.co/tqqeu2ypalkjhct9bgns6wxlalcpizwi.js" async></script>
</body>
<?php
include 'footer.php';
?>

</html>