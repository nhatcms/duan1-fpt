-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2024 at 09:17 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dam`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `url`) VALUES
(2, '793x448.png'),
(3, 'Banner web (1).png'),
(4, 's24pc.png');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `cate_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cate_name`) VALUES
(1, 'SamSung Galaxy'),
(2, 'SamSung Tab'),
(3, 'SamSung Watch');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `content`, `post_time`) VALUES
(7, 9, 7, 'Thời lượng pin rất tốt', '2024-12-06 03:51:16'),
(8, 9, 6, 'Chất lượng hoàn thiện tốt', '2024-12-06 03:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_amount` decimal(15,2) NOT NULL,
  `status` enum('Pending','Processing','Completed','Cancelled','Delivered') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Processing',
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `order_code` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_method` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date`, `total_amount`, `status`, `address`, `order_code`, `payment_method`) VALUES
(1, '6', '2024-12-01 10:14:33', 33000000.00, 'Delivered', '136 Khâm Thiên', 'DAA6F4', 'VNPAY'),
(2, '6', '2024-12-01 10:15:30', 25990000.00, 'Delivered', '136 Khâm Thiên', 'ECBD92', 'COD'),
(3, '6', '2024-12-01 11:12:12', 26990000.00, 'Delivered', 'Hoà Bình', 'FC7ACC', 'COD'),
(4, '6', '2024-12-01 11:13:20', 14980000.00, 'Delivered', '136 Khâm Thiên', 'E696FD', 'COD'),
(5, '6', '2024-12-01 11:23:05', 10490000.00, 'Delivered', 'Số nhà 11 ngách 999 ngõ JQK', 'B90778', 'VNPAY'),
(6, '6', '2024-12-04 18:35:55', 3990000.00, 'Pending', '136 Khâm Thiên', '8132C1', 'COD'),
(7, '6', '2024-12-05 17:46:16', 73480000.00, 'Delivered', '136 Khâm Thiên1', '2D8BF9', 'COD'),
(8, '6', '2024-12-05 23:55:31', 22470000.00, 'Delivered', 'Địa', '302DA6', 'VNPAY'),
(9, '6', '2024-12-06 00:33:15', 10490000.00, 'Delivered', 'TRung', '1A2DE0', 'VNPAY'),
(10, '6', '2024-12-06 01:03:46', 43490000.00, 'Pending', 'Nâpjaja', 'AE047B', 'VNPAY'),
(11, '9', '2024-12-06 03:50:48', 18480000.00, 'Pending', '136 Khâm Thiên', '1A2ACA', 'VNPAY');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 5, 1, 33000000.00),
(2, 2, 2, 1, 25990000.00),
(3, 3, 9, 1, 26990000.00),
(4, 4, 16, 2, 7490000.00),
(5, 5, 6, 1, 10490000.00),
(6, 6, 21, 1, 3990000.00),
(7, 7, 3, 1, 27990000.00),
(8, 7, 4, 1, 35000000.00),
(9, 7, 6, 1, 10490000.00),
(10, 8, 16, 3, 7490000.00),
(11, 9, 6, 1, 10490000.00),
(12, 10, 6, 1, 10490000.00),
(13, 10, 5, 1, 33000000.00),
(14, 11, 6, 1, 10490000.00),
(15, 11, 7, 1, 7990000.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `list_price` decimal(10,0) NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `cate_id` int NOT NULL,
  `isActive` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `list_price`, `img`, `description`, `cate_id`, `isActive`) VALUES
(1, 'Galaxy S23 Ultra	', 28990000, 30000000, 's23ultra.jpg', '<h2><strong>Điện thoại Samsung Galaxy S23 Ultra có gì mới?</strong></h2><blockquote><p><a href=\"https://cellphones.com.vn/samsung-galaxy-s23-ultra.html\"><strong>Samsung S23 Ultra</strong></a>&nbsp;là dòng <strong>điện thoại cao cấp</strong> của Samsung, sở hữu camera độ phân giải <strong>200MP</strong> ấn tượng,&nbsp;chip&nbsp;<strong>Snapdragon 8 Gen 2</strong> mạnh mẽ, bộ nhớ <strong>RAM 8GB</strong> mang lại hiệu suất xử lý vượt trội cùng <strong>khung viền vuông vức</strong> sang trọng. Sản phẩm được ra mắt từ đầu năm 2023.</p></blockquote><h3><strong>Thiết kế cao cấp, đường nét thời thượng, tinh tế</strong></h3><p>Tiếp nối thiết kế từ những chiếc Samsung Galaxy S22 Ultra, những chiếc <strong>Samsung S23 Ultra</strong> mang dáng vẻ thanh mảnh với những đường nét được gọt giũa chỉnh chu và cực kỳ tinh tế. Với màn hình tràn viền, tỷ lệ màn hình trên thân máy hơn 90% những chiếc điện thoại S23 Ultra hứa hẹn mang đến một thiết kế thời thượng thu hút mọi ánh nhìn.</p><p>&nbsp;</p><p>Vẫn là mặt lưng nguyên khối cùng cụm camera không viền được đặt ở góc trái trên cùng logo Samsung quen thuộc nằm góc dưới mặt lưng tạo cảm giác đơn giản nhưng không kém phần nổi bật cho thiết kế. Thanh lịch nhưng đặc biệt có sức hút, đơn giản mà toát lên sự cao cấp, những chiếc <strong>Samsung S23 Ultra</strong> chắc chắn là sự lựa chọn hoàn hảo khi bình chọn những thiết kế đỉnh cao trong năm 2023.</p><p>&nbsp;</p><p>Diện mạo của những chiếc Samsung Galaxy S23 Ultra có khả năng thu hút bất tận với chuỗi màu sắc đa dạng mà không kém phần thanh lịch, dòng điện thoại này ngay lập tức tạo nên định nghĩa vẻ đẹp công nghệ mới cho người dùng ngay khi chạm mắt.</p>', 1, 0),
(2, 'Galaxy Z Fold 5', 25990000, 26000000, 'zfold5.jpg', 'Điện thoại màn hình gập độc đáo, trải nghiệm đa nhiệm tuyệt vời.	', 1, 1),
(3, 'Galaxy Z Flip 5', 27990000, 28000000, 'zlip5.jpg', 'Điện thoại gập nhỏ gọn, phong cách thời trang.	', 1, 1),
(4, 'Galaxy S24 Ultra', 35000000, 36000000, 's24ultra.jpg', 'Phiên bản nâng cấp của S23 với màn hình lớn hơn và pin dung lượng cao hơn.	', 1, 1),
(5, 'Galaxy S24', 33000000, 33500000, 's24.jpg', 'Phiên bản nâng cấp của S23 với màn hình lớn hơn và pin dung lượng cao hơn.	', 1, 1),
(6, 'Galaxy A54', 10490000, 10990000, 'a53.jpg', '<p>Hội đồng An ninh Quốc gia Mỹ xác nhận đã \"thay đổi hướng dẫn\", cho phép Ukraine dùng tên lửa tầm xa ATACMS tập kích lãnh thổ Nga.</p><p>\"Ngay lúc này, họ có thể sử dụng tên lửa ATACMS để tự vệ trong tình huống cấp thiết. Điều đó đang xảy ra ở trong và xung quanh tỉnh Kursk\", phát ngôn viên Hội đồng An ninh Quốc gia Mỹ John Kirby tuyên bố trong buổi họp báo hôm 25/11, khi được yêu cầu bình luận về hiệu quả trong cách Ukraine sử dụng đạn ATACMS do Mỹ viện trợ.</p><p>ATACMS là tên lửa đạn đạo chiến thuật có tầm bắn khoảng 300 km. Đây là loại vũ khí có tầm bắn xa nhất mà phương Tây viện trợ cho Ukraine đến nay. Kirby cho biết sẽ để phía Ukraine thông tin về cách Kiev sử dụng tên lửa ATACMS, trình tự nhắm mục tiêu, mục đích và hiệu quả liên quan.</p><p>Ông Kirby tại buổi họp báo ở Nhà Trắng hôm 23/10. Ảnh: <i>AFP</i></p><p>Phát ngôn viên Hội đồng An ninh Quốc gia Mỹ sau đó nói \"chưa có gì thay đổi...\", dường như ám chỉ chính sách của Mỹ về cấm Ukraine sử dụng vũ khí tầm xa của Washington để tập kích lãnh thổ Nga, song dừng lại nửa chừng.</p><p>\"Hiển nhiên là chúng tôi đã thay đổi hướng dẫn và đưa ra định hướng mới rằng họ có thể sử dụng chúng để tập kích các mục tiêu trên\", ông Kirby nói tiếp.</p><p>Đây là lần đầu tiên giới chức Mỹ xác nhận đã gỡ rào vũ khí cho Ukraine. Truyền thông Mỹ hôm 17/11 đưa tin chính quyền Tổng thống Joe Biden đã cho phép Ukraine sử dụng tên lửa tầm xa do Washington cung cấp để tập kích lãnh thổ Nga, song Nhà Trắng khi đó không thừa nhận.</p><p>Sau đó hai ngày, Ukraine phóng 6 tên lửa đạn đạo ATACMS vào tỉnh Bryansk của Nga, gây cháy một kho đạn. Hôm 21/11, Kiev khai hỏa tiếp loạt tên lửa hành trình Storm Shadow do Anh viện trợ và đạn HIMARS vào các cơ sở quân sự tại tỉnh Bryansk và Kursk, trong đó có một sở chỉ huy của cánh quân Bắc.</p>', 1, 1),
(7, 'Galaxy A34', 7990000, 8490000, 'a34.jpg', '<h2><strong>Đánh giá điện thoại Samsung Galaxy A34 - Cấu hình tốt cùng camera sắc nét</strong></h2><p>Sau thành công của mẫu <strong>điện thoại Samsung Galaxy A33</strong>, phiên bản kế tiếp là Samsung Galaxy A34 đã được phát triển với nhiều cải tiến để hướng tới đối tượng khách hàng phổ thông. Hãy cùng đánh giá chi tiết những điểm nổi bật của chiếc điện thoại thuộc series <a href=\"https://cellphones.com.vn/mobile/samsung/galaxy-a.html\"><strong>Samsung Galaxy A</strong></a> này để bạn quyết định xem liệu sản phẩm này có phù hợp với nhu cầu sử dụng của mình không nhé.</p><h3><strong>Thiết kế mỏng, nhẹ</strong></h3><p><strong>Samsung Galaxy A34</strong> vẫn sử dụng thiết kế nổi bật với màu sắc trẻ trung và mặt lưng nổi bật khi sở hữu cụm camera sau 3 ống kính. Tuy nhiên, phần cạnh viền lại được bo tròn để mang lại cảm giác mềm mại, thoải mái khi cầm, sử dụng điện thoại.</p><p>&nbsp;</p><p>Samsung Galaxy được thiết kế mỏng, nhẹ với trọng lượng chỉ 199g và độ dày 8.2mm. Điện thoại sẽ bao gồm 3 phiên bản màu tại thị trường Việt nam là Bạc bất bại, Xanh dũng mãnh và Đen chiến binh.</p><h3><strong>Màn hình sắc nét, sống động</strong></h3><p>Sản phẩm sở hữu màn hình Super AMOLED có kích thước 6.6 inch. Với độ phân giải Full HD+, điện thoại Galaxy A34 chắc chắn sẽ có khả năng hiển thị hình ảnh một cách sống động, chân thực và sắc nét.</p><p>&nbsp;</p><p>Lớp kính cường lực được sử dụng trên Samsung Galaxy A34 sẽ đảm bảo chắc chắn được độ bền, khả năng chống trầy xước của điện thoại mà không làm ảnh hưởng tới chất lượng hiển thị hình ảnh.</p><p>Sản phẩm cũng sử dụng loại màn có tần số quét 120Hz giống như trên phiên bản tiền nhiệm. Điều này sẽ giúp cho các thao tác kéo/thả, đóng/mở ứng dụng cũng như trải nghiệm chơi game trên chiếc điện thoại này luôn mượt mà.</p><h3><strong>Cấu hình tốt nhất trong phân khúc</strong></h3><p>Samsung Galaxy A34 được trang bị bộ vi xử lý&nbsp;MT D1080&nbsp;8 nhân tới từ chính thương hiệu này. Với bộ vi xử lý này, Galaxy A34 sẽ có hiệu năng thuộc hàng tốt nhất trong phân khúc điện thoại tầm trung để đảm bảo thiết bị hoạt động mượt mà.</p><p><br>&nbsp;</p>', 1, 1),
(8, 'Galaxy Tab S9 Ultra', 30990000, 32990000, 'galaxy-tab-s9-ultra.jpg', 'Máy tính bảng cao cấp với màn hình lớn, cấu hình mạnh mẽ và bút S Pen.', 2, 1),
(9, 'Galaxy Tab S9+', 26990000, 28990000, 'galaxy-tab-s9-plus.jpg', 'Phiên bản nhỏ gọn hơn của Tab S9 Ultra, vẫn giữ nguyên hiệu năng và tính năng.', 2, 1),
(10, 'Galaxy Tab S9', 22990000, 24990000, 'galaxy-tab-s9.jpg', 'Mẫu máy tính bảng cơ bản của dòng Tab S9, phù hợp cho nhu cầu giải trí.', 2, 1),
(11, 'Galaxy Tab S8 UltraA', 26900000, 27990000, 'galaxy-tab-s8-plus.jpg', '<p>Máy tính bảng thế hệ trước, vẫn rất mạnh mẽ và đáng giá.aaaâ</p>', 2, 1),
(12, 'Galaxy Tab S8+', 21990000, 23990000, 'galaxy-tab-s8-plus.jpg', 'Phiên bản nhỏ gọn của Tab S8 Ultra, giá cả phải chăng hơn.', 2, 1),
(13, 'Galaxy Tab A8', 6990000, 7490000, 'galaxy-tab-a8.jpg', 'Máy tính bảng giá rẻ, phù hợp cho học sinh và sinh viên.', 2, 1),
(14, 'Galaxy Tab A7 Lite', 4490000, 4990000, 'galaxy-tab-a7-lite.jpg', 'Lựa chọn siêu tiết kiệm với thiết kế nhỏ gọn và tính năng cơ bản.', 2, 1),
(15, 'Galaxy Watch6 Classic', 8990000, 9490000, 'galaxy-watch6-classic.jpg', 'Đồng hồ thông minh cao cấp với thiết kế cổ điển và vòng bezel xoay vật lý.', 3, 1),
(16, 'Galaxy Watch6', 7490000, 7990000, 'galaxy-watch6.jpg', 'Phiên bản hiện đại của Watch6 Classic, không có vòng bezel xoay.', 3, 1),
(17, 'Galaxy Watch5 Pro', 9990000, 10490000, 'galaxy-watch5-pro.jpg', 'Đồng hồ thông minh dành cho người yêu thể thao với pin dung lượng lớn.', 3, 1),
(18, 'Galaxy Watch5', 6990000, 7490000, 'galaxy-watch5.jpg', 'Mẫu cơ bản của dòng Watch5, phù hợp với nhiều đối tượng người dùng.', 3, 1),
(19, 'Galaxy Watch4 Classic', 6490000, 6990000, 'galaxy-watch4-classic.jpg', 'Đồng hồ thế hệ trước, vẫn có thiết kế đẹp và nhiều tính năng hữu ích.', 3, 1),
(20, 'Galaxy Watch4', 5490000, 5990000, 'galaxy-watch4.jpg', 'Lựa chọn giá rẻ với thiết kế đơn giản và tính năng cơ bản.', 3, 1),
(21, 'Galaxy Watch Active2', 3990000, 4490000, 'galaxy-watch-active2.jpg', '<p>Đồng hồ thông minh cũ hơn, vẫn phù hợp với nhu cầu theo dõi sức khỏe cơ bản.</p>', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `real_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phoneNumber` varchar(11) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `imgPath` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'https://cdn-icons-png.flaticon.com/512/6596/6596121.png',
  `role` varchar(1) NOT NULL DEFAULT '0',
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `token` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `real_name`, `email`, `phoneNumber`, `password`, `imgPath`, `role`, `isActive`, `token`) VALUES
(1, 'nhatnguyena', 'Nhat Nguyen', 'johndoe@example.com', '0987717717', 'c81e728d9d4c2f636f067f89cc14862c', '302770-200.png', '1', 1, NULL),
(2, 'janesmith', 'Tô Tiến Đạt', 'janesmith@example.com', '0987717717', 'c4ca4238a0b923820dcc509a6f75849b', '302770-200.png', '3', 1, NULL),
(3, 'alicecute', 'Đoàn Quang Nam', 'alicejohnson@example.com', '0987717717', 'c4ca4238a0b923820dcc509a6f75849b', '302770-200.png', '3', 1, NULL),
(4, 'bobisbob', 'Lê Thuỳ Vân', 'bobbrown@example.com', '0987717717', 'c4ca4238a0b923820dcc509a6f75849b', '302770-200.png', '3', 1, NULL),
(5, 'davidngo', 'Phạm Diệu Linh', 'charliedavis@example.com', '0987717717', '552101d158e48d82eaf1cc191f1477a4', '302770-200.png', '3', 1, NULL),
(6, 'admin', 'Nguyễn Ngọc Nhật', 'admin@nhatnguyen.tech', '09877177111', 'c4ca4238a0b923820dcc509a6f75849b', '6748a932d8537.jpeg', '1', 1, NULL),
(7, 'testuser', 'Mật khẩu như tài khoản', 'cmsntvdn@adwaaaaaoa.com', '0999999999', 'c4ca4238a0b923820dcc509a6f75849b', '302770-200.png', '3', 0, NULL),
(9, 'admin1', 'Lê Quang Minh Chính Đại', 'nhatnguyencoder@hotmail.com', '0966901092', 'c4ca4238a0b923820dcc509a6f75849b', '302770-200.png', '1', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
