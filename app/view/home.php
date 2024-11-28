<?php

// $categoriesWithProducts = CategoryModel::getAllCategoriesWithProducts();
// $banners = BannerModel::getBanner();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SamCenter - Đại lý ủy quyền SamSung tại Việt Nam</title>
    <link rel="stylesheet" href="assets/styles/home.css?v<?php echo time(); ?>">
</head>


<?php
include 'header.php';
?>

<body >
    <div class="main-container">
        <div class="banner-box">
            <div class="slide-box">
                <button class="prev"><i class="fas fa-chevron-left"></i></button>
                <button class="next"><i class="fas fa-chevron-right"></i></button>
                <!-- Thêm PHP Banner vào đây -->
                <?php foreach ($banners as $banner) : ?>
                    <img src="assets/img/<?php echo htmlspecialchars($banner['url']); ?>" alt="Banner image" class="banner-img" width="100%">
                <?php endforeach; ?>
            </div>
            <div class="fixed-banner-box">
                <!-- Banner cố định -->
                <img src="assets/img/tab s9 tow.png" alt="Fixed banner" width="100%" class="fixed-banner-box-item">
                <img src="assets/img/w6pc.png" alt="Fixed banner" width="100%" class="fixed-banner-box-item">
            </div>

        </div>
        <div class="product-container">
            <?php foreach ($categoriesWithProducts as $categoryName => $products) : ?>
                <div class="product-card-container">
                    <div class="product-card-container-header">
                        <a href="#" class="product-card-container-header-title">
                            <?php echo htmlspecialchars($categoryName); ?>
                        </a>
                        <a href="#" class="product-card-container-header-button">
                            Xem tất cả
                        </a>
                    </div>
                    <?php if (empty($products)) : ?>
                        <p>No products available in this category.</p>
                    <?php else : ?>
                        <?php foreach ($products as $product) : ?>
                            <div class="product-card">
                                <a href="?action=product&id=<?php echo $product['product_id']; ?>" class="product-card-img">
                                    <img src="assets/img/<?php echo htmlspecialchars($product['product_image']) ?? ''; ?>" alt="Product" width="100%">
                                </a>
                                <a href="?action=product&id=<?php echo $product['product_id']; ?>" class="product-card-title">
                                    <?php echo htmlspecialchars($product['product_name'] ?? ''); ?>
                                </a>
                                <a href="?action=product&id=<?php echo $product['product_id']; ?>" class="product-card-price">
                                    <?php echo number_format($product['product_price'] ?? 0, 0, ',', '.'); ?>đ
                                    <?php if (!empty($product['product_list_price']) && $product['product_list_price'] > $product['product_price']) : ?>

                                    <?php endif; ?>
                                </a>
                                <!-- <p class="product-card-description">
                                    <?php echo htmlspecialchars($product['product_description'] ?? ''); ?>
                                </p> -->
                                <a href="?action=product&id=<?php echo $product['product_id']; ?>" class="product-card-button">
                                    Mua Ngay
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>


        <!-- Banner dòng thứ 4 -->
        <div class="benefit-container">
            <img src="assets/img/Frame 2013 (2).png" alt="benefit img" class="benefit-img benefit-img-left"></img>
            <img src="assets/img/Frame 2012 (2).png" alt="benefit img" class="benefit-img benefit-img-right"></img>
        </div>
        <!-- Kết thúc banner dòng thứ 4 -->
        <script src="//code.tidio.co/tqqeu2ypalkjhct9bgns6wxlalcpizwi.js" async></script>
    
        <!-- Tin tức -->
        <div class="news-container">
            <div class="news-container-header">
                <p class="news-container-header-title">Tin tức</p>
            </div>
            <div class="news-card-container">
                <div class="news-card">
                    <div class="news-card-img-container">
                        <img style="width:100%;height:100%" src="./assets/img/banner_trang_chu.png" class="news-card-img-container-img" alt="News" width="100%">
                    </div>
                    <div class="news-card-date" style="padding-top: 10px;" >
                        <i class="fa-solid fa-calendar-days"></i> 12/12/2021
                    </div>
                    <div class="news-card-title">
                        <a href="#">
                            <!-- Tieu de tin tuc -->
                            Galaxy Z Flip6 lộ diện: Dung lượng pin cải tiến, mạnh mẽ hơn với Snapdragon 8 Gen 3 for Galaxy.

                        </a>
                    </div>
                </div>
                <div class="news-card">
                    <div class="news-card-img">
                        <img  style="width:100%;height:100%" src="./assets/img/banner_trang_chu.png" class="news-card-img-container-img" alt="News" width="100%">
                    </div>
                    <div class="news-card-date" style="padding-top: 10px;">
                        <i class="fa-solid fa-calendar-days"></i> 12/12/2021
                    </div>
                    <div class="news-card-title">
                        <a style="padding-top: 5px;" href="#">
                            <!-- Tieu de tin tuc -->
                            Galaxy Z Flip6 lộ diện: Dung lượng pin cải tiến, mạnh mẽ hơn với Snapdragon 8 Gen 3 for Galaxy.

                        </a>
                    </div>
                </div>
                <div class="news-card">
                    <div class="news-card-img">
                        <img  style="width:100%;height:85%" src="./assets/img/banner_trang_chu.png" class="news-card-img-container-img" alt="News" width="100%">
                    </div>
                    <div class="news-card-date" style="margin-bottom: 20px;">
                        <i class="fa-solid fa-calendar-days"></i> 12/12/2021
                    </div>
                    <div class="news-card-title">
                        <a href="#">
                            <!-- Tieu de tin tuc -->
                            Galaxy Z Flip6 lộ diện: Dung lượng pin cải tiến, mạnh mẽ hơn với Snapdragon 8 Gen 3 for Galaxy.
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <!-- Kết thúc tin tức -->

        <!-- Nút back to top -->
        <a href="#" class="back-to-top"><i class="fas fa-chevron-up"></i></a>

    </div>
    <!-- Các scripts -->
    <script src="assets/scripts/slide.js?v<?php echo time(); ?>"></script>
    <script src="//code.tidio.co/tqqeu2ypalkjhct9bgns6wxlalcpizwi.js" async></script>
</body>
<?php
include 'footer.php';
'giohang.php'
?>

</html>