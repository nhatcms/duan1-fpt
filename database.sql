-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2024 at 01:16 PM
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
(2, 6, 5, 'a', '2024-11-30 11:00:56'),
(3, 6, 6, 'ok', '2024-11-30 17:23:29'),
(4, 6, 15, 'That\'s perfect!', '2024-11-30 17:25:45');

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
(1, '6', '2024-11-29 07:41:58', 26020000.00, 'Cancelled', '136 Khâm Thiên', 'DDF2EC', 'VNPAY'),
(2, '6', '2024-11-29 07:56:31', 120010000.00, 'Delivered', '136 Khâm Thiên', '6199D0', 'VNPAY'),
(3, '6', '2024-11-29 09:22:19', 31500000.00, 'Delivered', '23757 Michele Lock, Suite 992, 29304-7541, Lake Mikelfort, Arizona, United States', '0D91EF', 'VNPAY'),
(4, '6', '2024-11-29 09:46:27', 10490000.00, 'Pending', '03AAYGu2ToWi46gDy1N9xxv2BsaGhPG1MQaXcGCgnyU2_OLyk1wNUarZhBDglrIRo0PSyHrW9DnmGoFogVdhGdrNTSQa_9mU5a_lcdaRfDfJLmOGEGCwuNNPci6QcSRC6A9RcUvKnADY1B1yT0rI5fc5MpgkY6YI-0fM_sJO0xzHVxzU3UibxxjSNq0SdVHNKtk2eEjAPa_NT1xv1XJvo_4IOACzf4SqBTXZ59tXEAcbJV-8Tsmhy0_dOzwcXKKUvR7BOpuHzeowDqRKVdtDnooxzMsAt9chEFxSSQ5flmSg5tLp8wHAqy6SIA-Okhf1jTsCKm2YSe7K9YyarK0Hnmtr9Bp_Kev01X_KSRxhjqpW0BDXQMcpVxI5PnSVDfjsweHCKrwV3JM1Yflidv2Da5WAUf9aG_76UIGfgif4NHt5O31To3di75X7ym0VHimROsUaVXx9I36zA8mzLYwgJBnnFhrQqj5U8xv8JqN_XNiolsiOhY8tdzI1xCuBuoa4Pblmeq-0KDioTNlHhLUcgVFllJtn381VF2XEHR9dMdEyiR6r_rXFLUSiwOj_6cpIaAHbayr3OPFZHiZQf2_y6AzD4wT07nYtX4Ej1ai6O301eVlaMrLTh4FFwEzB--jwaCmEc8VHncz5rj', '3535C9', 'COD'),
(8, '6', '2024-11-30 11:04:55', 5520000.00, 'Delivered', '136 Khâm Thiên', '03AF19', 'VNPAY'),
(9, '6', '2024-11-30 11:10:33', 25990000.00, 'Pending', '136 Cau Dien\r\nnhatcms.id.vn', 'D76C59', 'COD'),
(10, '6', '2024-11-30 17:25:14', 8990000.00, 'Pending', '136 Khâm Thiên', '9E4A3C', 'COD'),
(11, '6', '2024-11-30 18:32:14', 33000000.00, 'Pending', '136 Khâm Thiên', 'C6F767', 'COD'),
(12, '6', '2024-11-30 18:32:47', 7490000.00, 'Pending', '136 Khâm Thiên', '1CBA76', 'COD'),
(13, '6', '2024-11-30 18:35:16', 9990000.00, 'Pending', '136 Khâm Thiên', '2EEDD4', 'COD'),
(14, '6', '2024-11-30 18:36:45', 9990000.00, 'Pending', '136 Khâm Thiên', 'B1C8E0', 'COD'),
(15, '6', '2024-11-30 18:40:04', 10490000.00, 'Pending', '136 Cau Dien\r\nnhatcms.id.vn', '6A11A4', 'COD'),
(16, '6', '2024-11-30 18:43:11', 26990000.00, 'Pending', '136 Khâm Thiên', '9FD643', 'COD'),
(17, '6', '2024-11-30 18:49:37', 7490000.00, 'Pending', '136 Khâm Thiên', '2B690E', 'COD'),
(18, '6', '2024-11-30 18:53:31', 7490000.00, 'Processing', 'Thái Bình', '1545E3', 'COD'),
(19, '6', '2024-11-30 18:58:13', 10490000.00, 'Pending', '136 Cau Dien', 'F6B898', 'COD');

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
(1, 1, 2, 1, 25990000.00),
(2, 2, 6, 2, 10490000.00),
(3, 2, 5, 3, 33000000.00),
(4, 3, 6, 3, 10490000.00),
(5, 4, 6, 1, 10490000.00),
(12, 8, 20, 1, 5490000.00),
(13, 9, 2, 1, 25990000.00),
(14, 10, 15, 1, 8990000.00),
(15, 11, 5, 1, 33000000.00),
(16, 12, 16, 1, 7490000.00),
(17, 13, 17, 1, 9990000.00),
(18, 14, 17, 1, 9990000.00),
(19, 15, 6, 1, 10490000.00),
(20, 16, 9, 1, 26990000.00),
(21, 17, 16, 1, 7490000.00),
(22, 18, 16, 1, 7490000.00),
(23, 19, 6, 1, 10490000.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `list_price` decimal(10,2) NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `cate_id` int NOT NULL,
  `isActive` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `list_price`, `img`, `description`, `cate_id`, `isActive`) VALUES
(1, 'Galaxy S23 Ultra	', 28990000.00, 30000000.00, 's23ultra.jpg', '<p>Galaxy S23 Ultra là chiếc điện thoại thông minh hàng đầu của Samsung, định nghĩa lại trải nghiệm di động cao cấp. Với thiết kế tinh tế và sang trọng, S23 Ultra mang đến cảm giác cầm nắm thoải mái và vẻ ngoài đẳng cấp.</p>', 1, 0),
(2, 'Galaxy Z Fold 5', 25990000.00, 26000000.00, 'zfold5.jpg', 'Điện thoại màn hình gập độc đáo, trải nghiệm đa nhiệm tuyệt vời.	', 1, 1),
(3, 'Galaxy Z Flip 5', 27990000.00, 28000000.00, 'zlip5.jpg', 'Điện thoại gập nhỏ gọn, phong cách thời trang.	', 1, 1),
(4, 'Galaxy S24 Ultra', 35000000.00, 36000000.00, 's24ultra.jpg', 'Phiên bản nâng cấp của S23 với màn hình lớn hơn và pin dung lượng cao hơn.	', 1, 1),
(5, 'Galaxy S24', 33000000.00, 33500000.00, 's24.jpg', 'Phiên bản nâng cấp của S23 với màn hình lớn hơn và pin dung lượng cao hơn.	', 1, 1),
(6, 'Galaxy A54', 10490000.00, 10990000.00, 'a53.jpg', '<p>Hội đồng An ninh Quốc gia Mỹ xác nhận đã \"thay đổi hướng dẫn\", cho phép Ukraine dùng tên lửa tầm xa ATACMS tập kích lãnh thổ Nga.</p><p>\"Ngay lúc này, họ có thể sử dụng tên lửa ATACMS để tự vệ trong tình huống cấp thiết. Điều đó đang xảy ra ở trong và xung quanh tỉnh Kursk\", phát ngôn viên Hội đồng An ninh Quốc gia Mỹ John Kirby tuyên bố trong buổi họp báo hôm 25/11, khi được yêu cầu bình luận về hiệu quả trong cách Ukraine sử dụng đạn ATACMS do Mỹ viện trợ.</p><p>ATACMS là tên lửa đạn đạo chiến thuật có tầm bắn khoảng 300 km. Đây là loại vũ khí có tầm bắn xa nhất mà phương Tây viện trợ cho Ukraine đến nay. Kirby cho biết sẽ để phía Ukraine thông tin về cách Kiev sử dụng tên lửa ATACMS, trình tự nhắm mục tiêu, mục đích và hiệu quả liên quan.</p><p>Ông Kirby tại buổi họp báo ở Nhà Trắng hôm 23/10. Ảnh: <i>AFP</i></p><p>Phát ngôn viên Hội đồng An ninh Quốc gia Mỹ sau đó nói \"chưa có gì thay đổi...\", dường như ám chỉ chính sách của Mỹ về cấm Ukraine sử dụng vũ khí tầm xa của Washington để tập kích lãnh thổ Nga, song dừng lại nửa chừng.</p><p>\"Hiển nhiên là chúng tôi đã thay đổi hướng dẫn và đưa ra định hướng mới rằng họ có thể sử dụng chúng để tập kích các mục tiêu trên\", ông Kirby nói tiếp.</p><p>Đây là lần đầu tiên giới chức Mỹ xác nhận đã gỡ rào vũ khí cho Ukraine. Truyền thông Mỹ hôm 17/11 đưa tin chính quyền Tổng thống Joe Biden đã cho phép Ukraine sử dụng tên lửa tầm xa do Washington cung cấp để tập kích lãnh thổ Nga, song Nhà Trắng khi đó không thừa nhận.</p><p>Sau đó hai ngày, Ukraine phóng 6 tên lửa đạn đạo ATACMS vào tỉnh Bryansk của Nga, gây cháy một kho đạn. Hôm 21/11, Kiev khai hỏa tiếp loạt tên lửa hành trình Storm Shadow do Anh viện trợ và đạn HIMARS vào các cơ sở quân sự tại tỉnh Bryansk và Kursk, trong đó có một sở chỉ huy của cánh quân Bắc.</p>', 1, 1),
(7, 'Galaxy A34', 7990000.00, 8490000.00, 'a34.jpg', 'Lựa chọn giá rẻ với thiết kế hiện đại và tính năng đa dạng.', 1, 1),
(8, 'Galaxy Tab S9 Ultra', 30990000.00, 32990000.00, 'galaxy-tab-s9-ultra.jpg', 'Máy tính bảng cao cấp với màn hình lớn, cấu hình mạnh mẽ và bút S Pen.', 2, 1),
(9, 'Galaxy Tab S9+', 26990000.00, 28990000.00, 'galaxy-tab-s9-plus.jpg', 'Phiên bản nhỏ gọn hơn của Tab S9 Ultra, vẫn giữ nguyên hiệu năng và tính năng.', 2, 1),
(10, 'Galaxy Tab S9', 22990000.00, 24990000.00, 'galaxy-tab-s9.jpg', 'Mẫu máy tính bảng cơ bản của dòng Tab S9, phù hợp cho nhu cầu giải trí.', 2, 1),
(11, 'Galaxy Tab S8 UltraA', 1111.00, 27990000.00, '67440a9c2ea44.png', '<p>Máy tính bảng thế hệ trước, vẫn rất mạnh mẽ và đáng giá.aaaâ</p>', 2, 1),
(12, 'Galaxy Tab S8+', 21990000.00, 23990000.00, 'galaxy-tab-s8-plus.jpg', 'Phiên bản nhỏ gọn của Tab S8 Ultra, giá cả phải chăng hơn.', 2, 1),
(13, 'Galaxy Tab A8', 6990000.00, 7490000.00, 'galaxy-tab-a8.jpg', 'Máy tính bảng giá rẻ, phù hợp cho học sinh và sinh viên.', 2, 1),
(14, 'Galaxy Tab A7 Lite', 4490000.00, 4990000.00, 'galaxy-tab-a7-lite.jpg', 'Lựa chọn siêu tiết kiệm với thiết kế nhỏ gọn và tính năng cơ bản.', 2, 1),
(15, 'Galaxy Watch6 Classic', 8990000.00, 9490000.00, 'galaxy-watch6-classic.jpg', 'Đồng hồ thông minh cao cấp với thiết kế cổ điển và vòng bezel xoay vật lý.', 3, 1),
(16, 'Galaxy Watch6', 7490000.00, 7990000.00, 'galaxy-watch6.jpg', 'Phiên bản hiện đại của Watch6 Classic, không có vòng bezel xoay.', 3, 1),
(17, 'Galaxy Watch5 Pro', 9990000.00, 10490000.00, 'galaxy-watch5-pro.jpg', 'Đồng hồ thông minh dành cho người yêu thể thao với pin dung lượng lớn.', 3, 1),
(18, 'Galaxy Watch5', 6990000.00, 7490000.00, 'galaxy-watch5.jpg', 'Mẫu cơ bản của dòng Watch5, phù hợp với nhiều đối tượng người dùng.', 3, 1),
(19, 'Galaxy Watch4 Classic', 6490000.00, 6990000.00, 'galaxy-watch4-classic.jpg', 'Đồng hồ thế hệ trước, vẫn có thiết kế đẹp và nhiều tính năng hữu ích.', 3, 1),
(20, 'Galaxy Watch4', 5490000.00, 5990000.00, 'galaxy-watch4.jpg', 'Lựa chọn giá rẻ với thiết kế đơn giản và tính năng cơ bản.', 3, 1),
(21, 'Galaxy Watch Active2', 3990000.00, 4490000.00, 'galaxy-watch-active2.jpg', '<p>Đồng hồ thông minh cũ hơn, vẫn phù hợp với nhu cầu theo dõi sức khỏe cơ bản.</p>', 3, 1),
(26, 'Galaxy Tab S8 UltraA', 12.00, 1000.00, '67440b17b2c38.png', '<p>ưđwwwww</p>', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `color` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `colorName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `color`, `colorName`, `price`) VALUES
(1, 1, '#FF5733', 'Da cam', 100.00),
(2, 1, '#33FF57', 'Xanh lá', 120.00),
(3, 2, '#3357FF', '1', 150.00),
(4, 2, '#FF33A1', '1', 170.00),
(5, 3, '#A1FF33', '1', 130.00),
(6, 3, '#5733FF', '1', 140.00),
(7, 4, '#FF3380', '1', 200.00);

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
(2, 'janesmith', 'Tô Tiến Đạt', 'janesmith@example.com', '0987717717', 'c4ca4238a0b923820dcc509a6f75849b', '302770-200.png', '3', 0, NULL),
(3, 'alicecute', 'Đoàn Quang Nam', 'alicejohnson@example.com', '0987717717', 'c4ca4238a0b923820dcc509a6f75849b', '302770-200.png', '2', 1, NULL),
(4, 'bobisbob', 'Lê Thuỳ Vân', 'bobbrown@example.com', '0987717717', 'c4ca4238a0b923820dcc509a6f75849b', '302770-200.png', '3', 1, NULL),
(5, 'davidngo', 'Phạm Diệu Linh', 'charliedavis@example.com', '0987717717', '552101d158e48d82eaf1cc191f1477a4', '302770-200.png', '3', 1, NULL),
(6, 'admin', 'Nguyễn Ngọc Nhật', 'admin@nhatnguyen.tech', '09877177111', 'c4ca4238a0b923820dcc509a6f75849b', '6748a932d8537.jpeg', '1', 1, NULL),
(7, 'testuser', 'Mật khẩu như tài khoản', 'cmsntvdn@adwaaaaaoa.com', '0999999999', '5d9c68c6c50ed3d02a2fcf54f63993b6', '302770-200.png', '3', 0, NULL),
(9, 'testusera1', 'Lê Quang Minh Chính Đại', 'nhatnguyencoder@hotmail.com', '0966901092', '9e710d0e06ce10f911569c11104dd2d4', '302770-200.png', '0', 1, NULL),
(10, 'testuser12', 'Nguyễn Điện Thoại', 'nhatnguyencodaer@hotmail.com', '0966901091', '9e710d0e06ce10f911569c11104dd2d4', '302770-200.png', '0', 1, NULL),
(11, 'testuser122', 'Lê Văn Laptop', 'nhatnguyencoaadaer@hotmail.com', '0988888881', '9e710d0e06ce10f911569c11104dd2d4', '302770-200.png', '0', 1, NULL),
(12, 'admin123444', 'Nhặt lá đá ống bơ', 'nhatkoy11118@gmail.com', '0966901087', '9e710d0e06ce10f911569c11104dd2d4', '302770-200.png', '0', 1, NULL),
(13, 'admin12344', 'Nhat Nguyen', 'nhatkoy1111a8@gmail.com', '0966901082', '9e710d0e06ce10f911569c11104dd2d4', '302770-200.png', '0', 1, NULL),
(23, 'admin1344', 'Nhat Nguyen', 'Nhataoy1111a8@gmail.com', '0961901082', '3e52c50904349a7538460e368c39e952', '302770-200.png', '0', 1, NULL),
(24, 'root12as', 'Nguyen Nam', 'nhatnguyencod12er@hotmail.com', '0966901064', '3790b0ce8351020c6ea70a21dbf932c8', 'https://cdn-icons-png.flaticon.com/512/6596/6596121.png', '0', 1, NULL),
(25, 'root12as11', 'Nguyen Nama', 'nhatnguyencod1112er@hotmail.com', '0966901063', '0d61f26cc7dd5333177f446042de8437', 'https://cdn-icons-png.flaticon.com/512/6596/6596121.png', '0', 1, NULL),
(26, 'nhatnguyencc12', 'Nhat Nguyen', 'nhathm2dev@gmail.com', '0988647733', 'efee5556838e6f5da05435ed332c97e7', 'https://cdn-icons-png.flaticon.com/512/6596/6596121.png', '0', 1, NULL),
(27, 'nhatnguyenc1c12', 'Nhat Nguyen', 'nhat.nguyen@chongluadao.vn', '0966901125', 'efee5556838e6f5da05435ed332c97e7', 'https://cdn-icons-png.flaticon.com/512/6596/6596121.png', '0', 1, NULL);

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
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
