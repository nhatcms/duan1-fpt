<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SamCenter - <?php echo $product['name']; ?></title>
    <link rel="icon" href="assets/img/favicon.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/fcb933068a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/styles/detail.css?v=<?php echo time(); ?>">
    <style>
        /* Reset mặc định */
        /* body {
            margin: 0;
            font-family: Arial, sans-serif;
        } */

        /* Container tổng */
        .product-container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Tiêu đề sản phẩm */
        .product-title {
            text-align: left;
            margin-bottom: 20px;
            /* margin-right: 10px; */
        }

        .product-title-text {
            font-size: 28px;
            text-align: left;
            font-weight: bold;
            display: inline-block;
            /* Để tiêu đề và ngôi sao cùng dòng */
        }

        /* Phần ảnh và thông tin chi tiết */
        .product-detail-container {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            justify-content: center;
            gap: 40px;
        }

        .product-img {
            flex: 1;
            max-width: 300px;
            height: auto;
            object-fit: contain;
            margin-right: 200px;

        }

        .product-detail-box {
            flex: 1;
            max-width: 500px;
        }

        /* Nút chọn màu */
        .color-button {
            width: 40px;
            height: 40px;
            margin: 10px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 0 0 2px transparent;
            transition: box-shadow 0.3s ease;
        }

        .color-button.blue {
            background-color: #0000FF;
        }

        .color-button.green {
            background-color: #00FF00;
        }

        .color-button.red {
            background-color: #FF0000;
        }

        .color-button.black {
            background-color: #000000;
        }

        .color-button.selected {
            box-shadow: 0 0 0 3px white, 0 0 0 6px black;
        }

        /* Thông tin giá */
        .product-detail-price {
            font-size: 20px;
            margin: 20px 0;
            text-align: left;
        }

        .product-price {
            font-size: 24px;
            color: #e74c3c;
            font-weight: 700;
        }

        .product-o-price {
            font-size: 18px;
            color: #000000;
            text-decoration: line-through;
            font-weight: 400;
        }

        /* Mô tả sản phẩm */
        .product-detail-description {
            margin-top: 20px;
        }

        .product-detail-title {
            font-weight: bold;
            margin-bottom: 10px;
        }
        .comment-suggestions {
            margin-bottom: 10px;
        }
        .suggestion-btn {
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            padding: 5px 10px;
            margin-right: 5px;
            cursor: pointer;
        }
        .suggestion-btn:hover {
            background-color: #e0e0e0;
        }


        /* Các sản phẩm liên quan */
        .related-product-container {
            margin-top: 40px;
        }

        .related-product-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .related-product-box {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .related-product-item {
            text-align: center;
            max-width: 200px;
        }

        .related-product-img {
            width: 100%;
            height: auto;
        }

        /* Bình luận */
        .comment-container {
            margin-top: 40px;
        }

        .comment-title {
            font-size: 20px;
            font-weight: bold;
        }

        .comment-box {
            margin: 20px 0;
        }

        .comment-form {
            margin-top: 20px;
        }

        .content-input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        .comment-btn {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .product-khuyen-mai-ap-dung {
            position: sticky;
            top: 5px;
            right: 10px;
            background-color: #f0f0f0;
            padding: 5px 5px 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            color: #333333;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 10px;
            text-align: left;
        }

        .related-product-box {
            display: flex;
            /* Sử dụng Flexbox */
            flex-wrap: nowrap;
            /* Giữ sản phẩm trên cùng một hàng */
            justify-content: space-between;
            /* Khoảng cách đều giữa các sản phẩm */
            gap: 30px;
            /* Tăng khoảng cách giữa các sản phẩm */
            padding: 20px;
            /* Khoảng cách bên trong container */
            max-width: 1200px;
            /* Giới hạn chiều rộng */
            margin: 0 auto;
            /* Căn giữa container */
        }

        .related-product-item {
            flex: 1;
            /* Các sản phẩm có chiều rộng bằng nhau */
            max-width: 23%;
            /* Đảm bảo hiển thị 4 sản phẩm */
            background-color: #fff;
            /* Nền trắng cho sản phẩm */
            text-align: center;
            /* Căn giữa nội dung */
            border: 1px solid #e0e0e0;
            /* Viền mỏng xám nhạt */
            border-radius: 10px;
            /* Bo góc sản phẩm */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Thêm bóng đổ nhẹ */
            padding: 15px;
            /* Khoảng cách bên trong sản phẩm */
            transition: transform 0.3s, box-shadow 0.3s;
            /* Hiệu ứng khi hover */
        }

        .related-product-item:hover {
            transform: translateY(-5px);
            /* Nâng lên khi hover */
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
            /* Tăng bóng đổ khi hover */
        }

        .related-product-img {
            width: 80%;
            /* Kích thước ảnh sản phẩm */
            height: auto;
            /* Tự động điều chỉnh chiều cao */
            margin-bottom: 10px;
            /* Khoảng cách giữa ảnh và tên sản phẩm */
        }

        .related-product-name {
            font-size: 16px;
            /* Kích thước chữ tên sản phẩm */
            font-weight: bold;
            color: #007BFF;
            /* Màu xanh nổi bật */
            margin-bottom: 5px;
            /* Khoảng cách giữa tên và giá */
        }

        .related-product-price {
            font-size: 14px;
            /* Kích thước chữ giá */
            color: #e74c3c;
            /* Màu đỏ cho giá */
            font-weight: bold;
        }
        .product-detail-phone {  
    border: 1px solid #ccc; /* Đường viền cho box */  
    border-radius: 5px; /* Bo góc cho box */  
    padding: 15px; /* Khoảng cách bên trong box */  
    max-width: 500px; /* Kích thước tối đa của box */  
    margin: auto; /* Căn giữa box */  
    background-color: #f9f9f9; /* Màu nền của box */  
    margin-right: 110px;
}  

.title h3 {  
    font-weight: 700;  
    font-size: 20px;  
    color: #000000;  
    border-bottom: 2px solid #000000;  
    padding-bottom: 10px;  
}  

.title-text {  
    margin-top: 10px;  
    font-size: 12pt;  
    color: #000000;  
    text-align: justify; /* Căn đều nội dung */  
    overflow-wrap: break-word; /* Đảm bảo từ dài sẽ được ngắt ra dòng mới */  
}
    </style>
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="product-container">
        <!-- Tiêu đề sản phẩm -->
        <div class="product-title">
            <h3 class="product-title-text">
                <?php echo $product['name']; ?>
            </h3>
        </div>
        <hr>

        <!-- Ảnh và chi tiết sản phẩm -->
        <div class="product-detail-container">
            <div>
                <div class="img" style="text-align: center;">
                    <!-- Ảnh sản phẩm -->
                    <img src="assets/img/<?php echo $product['img']; ?>" alt="product-img" class="product-img">
                </div>
                <hr>
                <div class="product-policy" style="color: #777777;font: 14px SamsungOne">
                <div class="prd-policy" style="margin-top: 48px; display: flex;">
    <ul style="list-style: none; padding: 0; margin: 0; width: 82%;">
        <li class="d-flex c-one" style="background-color: #f0f0f0; padding: 10px; text-align: left; align-items: center;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-repeat" viewBox="0 0 16 16" style="margin-right: 10px;">
                <path d="M11 5.466V4H5a4 4 0 0 0-3.584 5.777.5.5 0 1 1-.896.446A5 5 0 0 1 5 3h6V1.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384l-2.36 1.966a.25.25 0 0 1-.41-.192m3.81.086a.5.5 0 0 1 .67.225A5 5 0 0 1 11 13H5v1.466a.25.25 0 0 1-.41.192l-2.36-1.966a.25.25 0 0 1 0-.384l2.36-1.966a.25.25 0 0 1 .41.192V12h6a4 4 0 0 0 3.585-5.777.5.5 0 0 1 .225-.67Z" />
            </svg>
            <span>1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất.</span>
        </li>
        <br>
        <li class="d-flex c-two" style="background-color: #f0f0f0; padding: 10px; text-align: left; align-items: center;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16" style="margin-right: 10px;">
                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5.5 0 0 0"></path>
            </svg>
            <span>Ship hàng siêu tốc toàn quốc 1800.4886</span>
        </li>
        <br>
        <li class="d-flex c-three" style="background-color: #f0f0f0; padding: 10px; text-align: left; align-items: center;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16" style="margin-right: 10px;">
                <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
            </svg>
            <span>Bảo hành chính hãng 1 năm tại các trung tâm bảo hành hãng</span>
        </li>
        <br>
        <li class="d-flex c-four" style="background-color: #f0f0f0; padding: 10px; text-align: left; align-items: center;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16" style="margin-right: 10px;">
                <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
            </svg>
            <span>Bộ sản phẩm gồm: Hộp, Sách hướng dẫn, Cây lấy sim, Cáp</span>
        </li>
    </ul>
</div>

                </div>
                <br>
                <div class="product-detail-phone">  
    <div class="title">  
        <h3>Thông tin sản phẩm</h3>  
    </div>  
    <div class="title-text">  
        <?php echo $product['description']; ?>
    </div>  
</div>
            </div>


            <!-- Chi tiết sản phẩm -->
            <div class="product-detail-box">
                <p><strong>Giá bán tại MobibeLand:</strong></span></p>
                <div class="product-detail-price">
                    <div>
                        <p class="product-price" style="color: #000000;"><?php echo number_format($product['price']) . "₫"; ?></p>
                        <del class="product-o-price" style="color: red;"><?php echo number_format($product['list_price']); ?>₫</del>
                        <p>(Đã bao gồm VAT)</p>
                    </div>

                    <!-- thông tin khuyến mại  -->
                    <div class="product-khuyen-mai" style="background-color: #F7F7F7;">
                        <div style="padding: 12px 10px 0;">
                            <p class="title"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gift" viewBox="0 0 16 16">
                                    <path d="M3 2.5a2.5 2.5 0 0 1 5 0 2.5 2.5 0 0 1 5 0v.006c0 .07 0 .27-.038.494H15a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 1 14.5V7a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h2.038A3 3 0 0 1 3 2.506zm1.068.5H7v-.5a1.5 1.5 0 1 0-3 0c0 .085.002.274.045.43zM9 3h2.932l.023-.07c.043-.156.045-.345.045-.43a1.5 1.5 0 0 0-3 0zM1 4v2h6V4zm8 0v2h6V4zm5 3H9v8h4.5a.5.5 0 0 0 .5-.5zm-7 8V7H2v7.5a.5.5 0 0 0 .5.5z" />
                                </svg> Ưu đãi</p>
                        </div>
                        <div class="product-detail-khuyen-mai">
                            <div style="border-top:1px solid black"></div>

                            <div class="product-khuyen-mai-ap-dung">
                                <span style="color: #000000;">
                                    ( Khuyến mãi dự kiến áp dụng
                                    <strong>đến 23h59 | 30/12/2024</strong>
                                    )
                                </span>
                            </div>
                            <hr>
                            <p>
                                <span style="text-decoration: underline;">
                                    <span style="color: #e03e2d; text-decoration: underline;"><strong>I. Ưu Đãi&nbsp;</strong></span>
                                </span>
                            </p>
                            <ul>
                                <li style="list-style-type: none;">
                                    <ul>
                                        <li>

                                            Giảm
                                            <strong>500.000đ </strong>
                                            khi thanh toán qua QR-Code Zalo Pay (code: ZLPSD - SL có hạn)&nbsp;
                                        </li>
                                        <li>
                                            Giảm
                                            <strong>500.000đ </strong>
                                            khi thanh toán qua thẻ tín dụng Techcombank, VIB, VPBank
                                        </li>
                                        <li>
                                            Giảm 20% gói SC+ khi mua kèm
                                        </li>
                                        <li>
                                            Ưu đãi mua kèm combo Watch Ultra giảm 2.5 triệu, Watch 7 / Watch 6 Classic giảm 1 triệu, Buds 3 Pro giảm 1.2 triệu, Buds 3 giảm 1 triệu
                                        </li>
                                        <li>Hỗ trợ trả góp 0% qua thẻ tín dụng</li>
                                        <li>Trợ giá thu cũ đổi mới</li>

                                    </ul>
                                </li>
                            </ul>
                            <hr>
                            <p style="text-align: center;">
                                <span style="color: #000000; padding: 3px 16px 20px 20px; font-size: 8pt;"><span style="text-decoration: underline;">Lưu ý:</span> Không cộng gộp CTKM giảm giá qua cổng thanh toán<br>(*) Liên hệ nhân viên tư vấn để biết thêm chi tiết</span>
                            </p>
                        </div>

                    </div>
                </div>
                <div class="product-detail-action-button">
                    <div class="first-add-to-cart">
                        <!-- <button class="btn btn-dark" style="width: 245px">
                            <span id="buy-now-price-388" style="display:none"></span>
                            <span>Mua ngay</span>
                        </button> -->
                        <form id="addToCartForm" class="btn">
                            <input type="hidden" name="id" value="<?php echo $product['id']; ?>"> <!-- ID sản phẩm -->
                            <input type="hidden" name="name" value="<?php echo $product['name']; ?>"> <!-- Tên sản phẩm -->
                            <input type="hidden" name="img" value="<?php echo $product['img']; ?>"> <!-- Ảnh sản phẩm -->
                            <input type="hidden" name="price" value="<?php echo $product['price']; ?>"> <!-- Giá sản phẩm -->
                            <?php if ($product['isActive'] == 0): ?>
                                <button type="button" class="btn btn-dark" style="width: 100%; display: block; margin: 0 auto;" disabled>Sản phẩm đã ngừng kinh doanh</button>
                            <?php else: ?>
                                <button type="button" id="addToCartBtn" class="btn btn-dark" style="width: 100%; display: block; margin: 0 auto;">Thêm vào giỏ hàng</button>
                            <?php endif; ?>
                        </form>

                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
                        <script>
                            document.getElementById('addToCartBtn').addEventListener('click', function () {
                            // Lấy dữ liệu từ form
                            const form = document.getElementById('addToCartForm');
                            const id = form.querySelector('input[name="id"]').value;
                            const name = form.querySelector('input[name="name"]').value;
                            const img = form.querySelector('input[name="img"]').value;
                            const price = form.querySelector('input[name="price"]').value;

                            fetch('./app/function/cart/add-to-cart.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded',
                                },
                                body: `id=${id}&name=${name}&img=${img}&price=${price}`,
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Thành công!',
                                        text: 'Sản phẩm đã được thêm vào giỏ hàng.',
                                        timer: 1500,
                                        showConfirmButton: false
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Lỗi!',
                                        text: data.message || 'Đã xảy ra lỗi khi thêm sản phẩm.',
                                    });
                                }
                            })
                            .catch(error => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Lỗi!',
                                    text: 'Không thể thêm sản phẩm vào giỏ hàng.',
                                });
                                console.error('Lỗi:', error);
                            });
                        });

                        </script>
                        <script>
                            // Hàm thêm gợi ý vào ô input
                            function insertSuggestion(suggestion) {
                                const input = document.getElementById('comment-content');
                                input.value = suggestion;
                            }
                        </script>




                    </div>

                </div>
                <!-- <div class="product-detail-description">
                    <p><?php echo $product['description']; ?></p>
                </div> -->
            </div>

            <!-- Button mua hàng  -->

        </div>


        <!-- Sản phẩm liên quan -->
        <div class="related-product-container" style="margin: 56px 0 20px">
            <div class="related-product-title" style="color: #1D1D1F;text-align: center;font-weight: 900;height:30px">
                <strong style="color: #000000; font: 24px SamsungSharpSans">Sản phẩm liên quan</strong>
            </div>

            <div class="related-product-box">
                <?php foreach ($relatedProducts as $relatedProduct) { ?>
                    <div class="related-product-item">
                        <a href="?action=product&id=<?php echo $relatedProduct['id']; ?>">
                            <img src="assets/img/<?php echo $relatedProduct['img']; ?>" alt="related-product-img" class="related-product-img">
                            <p class="related-product-name"><?php echo $relatedProduct['name']; ?></p>
                            <p class="related-product-price"><?php echo number_format($relatedProduct['price']); ?>₫</p>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>

        <!-- Bình luận -->
        <div class="comment-container">
            <div class="comment-box">
                <p class="comment-title">Các đánh giá của người dùng về <?= $product['name']?></p>
                <div>
                    <?php if (count($comments) === 0) { ?>
                        <p>Chưa có bình luận cho sản phẩm này, hãy chia sẻ!</p>
                    <?php } else { ?>
                        <?php foreach ($comments as $comment) { ?>
                            <div class="comment-item">
                                <p><strong><?php echo $comment['real_name']; ?></strong>: <?php echo $comment['content']; ?> </p>
                                <!-- post time -->
                                <p style="color: #777777;">&ThinSpace;&ThinSpace; &ThinSpace;    at: <?php echo date('d/m/Y H:i:s', strtotime($comment['post_time'])); ?></p>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <form action="#" method="POST" class="comment-form">
                <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                    <div class="comment-suggestions">
                        <span>Gợi ý: </span>
                        <button type="button" class="suggestion-btn" onclick="insertSuggestion('Thời lượng pin rất tốt')">Thời lượng pin rất tốt</button>
                        <button type="button" class="suggestion-btn" onclick="insertSuggestion('Chất lượng hoàn thiện tốt')">Chất lượng hoàn thiện tốt</button>
                        <button type="button" class="suggestion-btn" onclick="insertSuggestion('Giá cả hợp lý')">Giá cả hợp lý</button>
                        <button type="button" class="suggestion-btn" onclick="insertSuggestion('Giao hàng nhanh chóng')">Giao hàng nhanh chóng</button>
                        <button type="button" class="suggestion-btn" onclick="insertSuggestion('Dịch vụ khách hàng tốt')">Dịch vụ khách hàng tốt</button>
                    </div>
                <?php endif; ?>
                <input type="text" name="comment-content" id="comment-content" class="content-input" required>
                <button type="submit" class="comment-btn" name="comment-btn">Gửi</button>
            </form>
        </div>
    </div>

    <script>
        let selectedButton = null;

        // Hàm thay đổi màu
        function changeColor(colorName, button) {
            document.getElementById('color-label').textContent = colorName;

            if (selectedButton) selectedButton.classList.remove('selected');
            button.classList.add('selected');
            selectedButton = button;
        }

        window.onload = () => {
            const defaultButton = document.querySelector('.color-button.blue');
            changeColor('Blue', defaultButton);
        };
    </script>

    <?php include 'footer.php'; ?>
</body>

</html>