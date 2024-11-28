<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/styles/home.css?v<?php echo time(); ?>">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        /* Margin toàn trang */
        body {
            margin: 0 30px;
            /* Thêm margin vào body để tạo khoảng cách */
        }

        .main-container {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
            padding: 20px;
           
        }

        .khuyen-mai {
            /* background-color: red; */
            height: auto;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .khuyen-mai .title h1 {
            font-size: 32px;
            line-height: 36px;
            text-align: center;
            color: #1D1D1F;
            border-bottom: none;
        }

        .khuyen-mai .body {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* Tạo 2 cột */
            gap: 20px;
            /* Khoảng cách giữa các phần tử */
            margin-top: 20px;
        }

        .body-item-news {
            background-color: white;
            color: black;
            padding: 20px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: grid;
            /* Sử dụng CSS Grid */
            grid-template-columns: 1fr 1fr;
            /* Chia thành 2 cột bằng nhau */
            gap: 10px;
            height: 200px;
            /* Chiều cao cố định */
            align-items: center;
            overflow: hidden;
            /* Ẩn nội dung tràn khung */
        }

        .body-item-news .left,
        .body-item-news .right {
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            height: 100%;
            /* Chiều cao 100% để khớp với khung cha */
        }

        .body-item-news .left img {
            max-width: 100%;
            /* Đảm bảo ảnh không tràn chiều rộng */
            flex-direction: row;
            /* Nội dung xếp theo hàng ngang */
            max-height: 100%;
            /* Đảm bảo ảnh không tràn chiều cao */
            object-fit: cover;
            /* Đảm bảo ảnh giữ tỉ lệ và vừa với khung */
            border-radius: 5px;
            /* Bo góc cho ảnh (tuỳ chọn) */
        }

        .new-title {
            text-align: left;
            /* Căn chữ về bên trái */
            margin: 0;
            /* Xóa khoảng cách không cần thiết */
            padding: 0;
            /* Xóa khoảng cách bên trong không cần thiết */
            font-size: 16px;
            /* Tùy chỉnh kích thước chữ */
            line-height: 1.5;
            /* Khoảng cách giữa các dòng */
            word-wrap: break-word;
            /* Tự động xuống dòng khi vượt chiều rộng */
            white-space: normal;
            /* Bỏ trạng thái không xuống dòng */
        }

        .new-title p {
            margin-bottom: 20px;
            font-weight: 500;
            font-size: 10;

        }
        .danhgia{
            text-align: center;
            color: blue;
            font-weight: 600;
            font-size: small;
            
        }
    </style>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="main-container">
        <div class="khuyen-mai">
            <div class="title">
                <h1>Khuyến mãi</h1>
            </div>
            <div class="body">
                <div class="body-item-news">
                    <div class="left"><img src="assets/img/khuyenmai1.jpeg" alt=""></div>
                    <div class="right">
                        <div class="new-title">
                            <p>Chương Trình Ưu Đãi 1.000.000đ Cho Khách Hàng Mua Galaxy Z Fold6/ Z Flip6</p>
                            <p id="date" style="color:#86868B;padding-bottom:10px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z" />
                                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                </svg> 01/01/2025</p>

                        </div>
                        <br>

                    </div>

                </div>
                <div class="body-item-news">
                    <div class="left"><img src="assets/img/khuyenmai2.jpeg" alt=""></div>
                    <div class="right">
                        <div class="new-title">
                            <p>Chương Trình Ưu Đãi 1.000.000đ Cho Khách Hàng Mua Galaxy Z Fold6/ Z Flip6</p>
                            <p id="date" style="color:#86868B;padding-bottom:10px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z" />
                                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                </svg> 01/01/2025</p>

                        </div>
                        <br>

                    </div>

                </div>
                <div class="body-item-news">
                    <div class="left"><img src="assets/img/khuyenmai3.png" alt=""></div>
                    <div class="right">
                        <div class="new-title">
                            <p>Chương Trình Ưu Đãi 1.000.000đ Cho Khách Hàng Mua Galaxy Z Fold6/ Z Flip6</p>
                            <p id="date" style="color:#86868B;padding-bottom:10px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z" />
                                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                </svg> 01/01/2025</p>

                        </div>
                        <br>

                    </div>

                </div>
                <div class="body-item-news">
                    <div class="left"><img src="assets/img/khuyenmai4.png" alt=""></div>
                    <div class="right">
                        <div class="new-title">
                            <p>Chương Trình Ưu Đãi 1.000.000đ Cho Khách Hàng Mua Galaxy Z Fold6/ Z Flip6</p>
                            <p id="date" style="color:#86868B;padding-bottom:10px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z" />
                                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                </svg> 01/01/2025</p>

                        </div>
                        <br>

                    </div>

                </div>
            </div>
           
        </div>
        <div class="danhgia"><p>Xem tất cả đánh giá sản phẩm</p></div>

        <!-- Mẹo hay  -->
        <div class="khuyen-mai">
            <div class="title">
                <h1>Mẹo hay</h1>
            </div>
            <div class="body">
                <div class="body-item-news">
                    <div class="left"><img src="assets/img/meohay1.jpeg" alt=""></div>
                    <div class="right">
                        <div class="new-title">
                            <p>Chương Trình Ưu Đãi 1.000.000đ Cho Khách Hàng Mua Galaxy Z Fold6/ Z Flip6</p>
                            <p id="date" style="color:#86868B;padding-bottom:10px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z" />
                                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                </svg> 01/01/2025</p>

                        </div>
                        <br>

                    </div>

                </div>
                <div class="body-item-news">
                    <div class="left"><img src="assets/img/meohay2.jpeg" alt=""></div>
                    <div class="right">
                        <div class="new-title">
                            <p>Chương Trình Ưu Đãi 1.000.000đ Cho Khách Hàng Mua Galaxy Z Fold6/ Z Flip6</p>
                            <p id="date" style="color:#86868B;padding-bottom:10px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z" />
                                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                </svg> 01/01/2025</p>

                        </div>
                        <br>

                    </div>

                </div>
                <div class="body-item-news">
                    <div class="left"><img src="assets/img/meohay3.jpeg" alt=""></div>
                    <div class="right">
                        <div class="new-title">
                            <p>Chương Trình Ưu Đãi 1.000.000đ Cho Khách Hàng Mua Galaxy Z Fold6/ Z Flip6</p>
                            <p id="date" style="color:#86868B;padding-bottom:10px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z" />
                                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                </svg> 01/01/2025</p>

                        </div>
                        <br>

                    </div>

                </div>
                <div class="body-item-news">
                    <div class="left"><img src="assets/img/meohay4.jpeg" alt=""></div>
                    <div class="right">
                        <div class="new-title">
                            <p>Chương Trình Ưu Đãi 1.000.000đ Cho Khách Hàng Mua Galaxy Z Fold6/ Z Flip6</p>
                            <p id="date" style="color:#86868B;padding-bottom:10px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z" />
                                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                </svg> 01/01/2025</p>

                        </div>
                        <br>

                    </div>

                </div>
            </div>
        </div>
        <div class="danhgia"><p>Xem tất cả đánh giá sản phẩm</p></div>

        <!-- Đánh giá sản phẩm  -->
        <div class="khuyen-mai">
            <div class="title">
                <h1>Đánh giá sản phẩm</h1>
            </div>
            <div class="body">
                <div class="body-item-news">
                    <div class="left"><img src="assets/img/danhgiasp1.jpeg" alt=""></div>
                    <div class="right">
                        <div class="new-title">
                            <p>Chương Trình Ưu Đãi 1.000.000đ Cho Khách Hàng Mua Galaxy Z Fold6/ Z Flip6</p>
                            <p id="date" style="color:#86868B;padding-bottom:10px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z" />
                                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                </svg> 01/01/2025</p>

                        </div>
                        <br>

                    </div>

                </div>
                <div class="body-item-news">
                    <div class="left"><img src="assets/img/danhgiasp2.jpeg" alt=""></div>
                    <div class="right">
                        <div class="new-title">
                            <p>Chương Trình Ưu Đãi 1.000.000đ Cho Khách Hàng Mua Galaxy Z Fold6/ Z Flip6</p>
                            <p id="date" style="color:#86868B;padding-bottom:10px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z" />
                                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                </svg> 01/01/2025</p>

                        </div>
                        <br>

                    </div>

                </div>
                <div class="body-item-news">
                    <div class="left"><img src="assets/img/danhgiasp3.jpeg" alt=""></div>
                    <div class="right">
                        <div class="new-title">
                            <p>Chương Trình Ưu Đãi 1.000.000đ Cho Khách Hàng Mua Galaxy Z Fold6/ Z Flip6</p>
                            <p id="date" style="color:#86868B;padding-bottom:10px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z" />
                                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                </svg> 01/01/2025</p>

                        </div>
                        <br>

                    </div>

                </div>
                <div class="body-item-news">
                    <div class="left"><img src="assets/img/danhgiasp4.jpeg" alt=""></div>
                    <div class="right">
                        <div class="new-title">
                            <p>Chương Trình Ưu Đãi 1.000.000đ Cho Khách Hàng Mua Galaxy Z Fold6/ Z Flip6</p>
                            <p id="date" style="color:#86868B;padding-bottom:10px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z" />
                                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                </svg> 01/01/2025</p>

                        </div>
                        <br>

                    </div>

                </div>
            </div>
        </div>  
        <div class="danhgia"><p>Xem tất cả đánh giá sản phẩm</p></div>

        <!-- Tư vấn  -->
          <div class="khuyen-mai">
            <div class="title">
                <h1>Tư vấn</h1>
            </div>
            <div class="body">
                <div class="body-item-news">
                    <div class="left"><img src="assets/img/tuvan1.jpeg" alt=""></div>
                    <div class="right">
                        <div class="new-title">
                            <p>Chương Trình Ưu Đãi 1.000.000đ Cho Khách Hàng Mua Galaxy Z Fold6/ Z Flip6</p>
                            <p id="date" style="color:#86868B;padding-bottom:10px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z" />
                                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                </svg> 01/01/2025</p>

                        </div>
                        <br>

                    </div>

                </div>
                <div class="body-item-news">
                    <div class="left"><img src="assets/img/tuvan2.jpeg" alt=""></div>
                    <div class="right">
                        <div class="new-title">
                            <p>Chương Trình Ưu Đãi 1.000.000đ Cho Khách Hàng Mua Galaxy Z Fold6/ Z Flip6</p>
                            <p id="date" style="color:#86868B;padding-bottom:10px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z" />
                                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                </svg> 01/01/2025</p>

                        </div>
                        <br>

                    </div>

                </div>
                <div class="body-item-news">
                    <div class="left"><img src="assets/img/tuvan3.jpeg" alt=""></div>
                    <div class="right">
                        <div class="new-title">
                            <p>Chương Trình Ưu Đãi 1.000.000đ Cho Khách Hàng Mua Galaxy Z Fold6/ Z Flip6</p>
                            <p id="date" style="color:#86868B;padding-bottom:10px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z" />
                                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                </svg> 01/01/2025</p>

                        </div>
                        <br>

                    </div>

                </div>
                <div class="body-item-news">
                    <div class="left"><img src="assets/img/tuvan4.jpeg" alt=""></div>
                    <div class="right">
                        <div class="new-title">
                            <p>Chương Trình Ưu Đãi 1.000.000đ Cho Khách Hàng Mua Galaxy Z Fold6/ Z Flip6</p>
                            <p id="date" style="color:#86868B;padding-bottom:10px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z" />
                                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                </svg> 01/01/2025</p>

                        </div>
                        <br>

                    </div>

                </div>
            </div>
        </div>  
        <div class="danhgia"><p>Xem tất cả đánh giá sản phẩm</p></div>

    </div>
    <?php include 'footer.php' ?>
</body>

</html>