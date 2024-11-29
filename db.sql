-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2024 at 03:09 AM
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
(70, 1, 1, 'The smartphone has an incredible display and performance!', '2023-12-24 00:00:00'),
(71, 1, 2, 'This tablet is perfect for productivity and entertainment.', '2023-11-10 00:00:00'),
(72, 2, 3, 'The smartwatch is very stylish and has many useful features.', '2023-05-09 00:00:00'),
(73, 2, 4, 'I’m impressed with the battery life of this smartphone.', '2023-03-09 00:00:00'),
(74, 3, 5, 'The tablet is very responsive and great for reading and browsing.', '2023-11-16 00:00:00'),
(75, 3, 6, 'The smartwatch tracks my fitness activities accurately.', '2023-10-24 00:00:00'),
(76, 4, 7, 'The smartphone camera quality is superb for photography.', '2023-06-11 00:00:00'),
(77, 4, 8, 'This tablet’s performance is excellent for gaming.', '2023-10-12 00:00:00'),
(78, 5, 9, 'The smartwatch has a sleek design and is very comfortable to wear.', '2023-07-25 00:00:00'),
(79, 5, 10, 'The smartphone’s fast charging feature is very convenient.', '2023-06-23 00:00:00'),
(80, 1, 11, 'The tablet’s display is clear and vibrant.', '2023-09-11 00:00:00'),
(81, 1, 12, 'The smartwatch’s battery lasts all day with regular use.', '2023-01-14 00:00:00'),
(82, 2, 13, 'The smartphone is very durable and resistant to scratches.', '2023-02-10 00:00:00'),
(83, 2, 14, 'The tablet is lightweight and easy to carry around.', '2023-06-11 00:00:00'),
(84, 3, 15, 'The smartwatch’s health tracking features are very accurate.', '2023-11-16 00:00:00'),
(85, 3, 16, 'The smartphone’s user interface is very intuitive and easy to use.', '2023-01-17 00:00:00'),
(86, 4, 17, 'The tablet’s battery life is impressive and lasts all day.', '2023-08-09 00:00:00'),
(87, 4, 18, 'The smartwatch’s notifications are timely and helpful.', '2023-11-21 00:00:00'),
(88, 5, 19, 'The smartphone’s performance is top-notch and handles multitasking well.', '2023-08-18 00:00:00'),
(89, 5, 20, 'The tablet is perfect for watching videos and streaming.', '2023-06-23 00:00:00'),
(90, 1, 21, 'The smartwatch is a great tool for managing notifications and reminders.', '2023-06-28 00:00:00'),
(91, 1, 1, 'The smartphone’s build quality is very solid and premium.', '2023-01-10 00:00:00'),
(92, 2, 2, 'This tablet is ideal for both work and play.', '2023-08-29 00:00:00'),
(93, 2, 3, 'The smartwatch’s heart rate monitor is accurate and reliable.', '2023-03-23 00:00:00'),
(94, 3, 4, 'The smartphone’s camera features are very advanced.', '2023-02-18 00:00:00'),
(95, 3, 5, 'The tablet’s touch screen is highly responsive.', '2023-12-31 00:00:00'),
(96, 4, 6, 'The smartwatch’s design is sleek and modern.', '2023-08-04 00:00:00'),
(97, 4, 7, 'The smartphone’s software updates are frequent and improve performance.', '2023-12-17 00:00:00'),
(98, 5, 8, 'The tablet’s speakers provide excellent sound quality.', '2023-01-09 00:00:00'),
(99, 5, 9, 'The smartwatch’s sleep tracking feature is very useful.', '2023-03-29 00:00:00'),
(100, 1, 10, 'The smartphone’s screen resolution is excellent for media consumption.', '2023-02-15 00:00:00'),
(101, 1, 11, 'The tablet’s app performance is very smooth.', '2023-11-30 00:00:00'),
(102, 2, 12, 'The smartwatch’s GPS function is precise and reliable.', '2023-03-09 00:00:00'),
(103, 2, 13, 'The smartphone’s fingerprint sensor works flawlessly.', '2023-03-10 00:00:00'),
(104, 3, 14, 'The tablet’s battery charges quickly.', '2023-05-19 00:00:00'),
(105, 3, 15, 'The smartwatch is very responsive and easy to navigate.', '2023-05-04 00:00:00'),
(106, 4, 16, 'The smartphone’s overall performance is outstanding.', '2023-07-20 00:00:00'),
(107, 4, 17, 'The tablet’s reading mode is very easy on the eyes.', '2023-09-24 00:00:00'),
(108, 5, 18, 'The smartwatch’s fitness tracking is very motivating.', '2023-01-02 00:00:00'),
(109, 5, 19, 'The smartphone’s storage capacity is more than sufficient.', '2023-11-02 00:00:00'),
(110, 1, 20, 'The tablet’s multitasking capabilities are impressive.', '2023-03-02 00:00:00'),
(111, 1, 21, 'The smartwatch’s interface is user-friendly and customizable.', '2023-04-26 00:00:00'),
(112, 2, 1, 'The smartphone is a great value for the price.', '2023-01-31 00:00:00'),
(113, 2, 2, 'The tablet is ideal for both casual and professional use.', '2023-06-20 00:00:00'),
(114, 3, 3, 'The smartwatch integrates well with my other devices.', '2023-02-04 00:00:00'),
(115, 3, 4, 'The smartphone’s high-resolution screen is great for gaming.', '2023-01-23 00:00:00'),
(116, 4, 5, 'The tablet’s performance is reliable for all tasks.', '2023-01-11 00:00:00'),
(117, 4, 6, 'The smartwatch is very durable and withstands daily wear.', '2023-12-15 00:00:00'),
(118, 5, 7, 'The smartphone’s camera captures stunning photos.', '2023-09-11 00:00:00'),
(119, 5, 8, 'The tablet’s build quality feels premium.', '2023-08-11 00:00:00'),
(120, 1, 9, 'The smartwatch’s battery life is impressive.', '2023-12-16 00:00:00'),
(121, 1, 10, 'The smartphone’s design is sleek and modern.', '2023-12-19 00:00:00'),
(122, 2, 11, 'The tablet’s color accuracy is excellent.', '2023-12-16 00:00:00'),
(123, 2, 12, 'The smartwatch’s notifications are very helpful.', '2023-11-21 00:00:00'),
(124, 3, 13, 'The smartphone’s user experience is top-notch.', '2023-07-28 00:00:00'),
(125, 3, 14, 'The tablet’s overall performance is very smooth.', '2023-03-11 00:00:00'),
(126, 4, 15, 'The smartwatch is a great companion for daily activities.', '2023-03-28 00:00:00'),
(127, 4, 16, 'The smartphone’s screen is perfect for media and games.', '2023-08-13 00:00:00'),
(128, 5, 17, 'The tablet’s battery performance is outstanding.', '2023-05-13 00:00:00'),
(129, 5, 18, 'The smartwatch’s design is both functional and fashionable.', '2023-12-22 00:00:00'),
(130, 1, 19, 'The smartphone’s connectivity options are excellent.', '2023-10-12 00:00:00'),
(131, 1, 20, 'The tablet’s high-speed performance is great for multitasking.', '2023-12-22 00:00:00'),
(132, 2, 21, 'The smartwatch’s heart rate monitor is accurate and reliable.', '2023-07-14 00:00:00'),
(167, 1, 12, 'Dep vai ca nho\r\n', '2023-09-27 00:00:00'),
(168, 1, 19, 'Test comment', '2023-02-06 00:00:00'),
(169, 20, 6, 'test', '2023-04-13 00:00:00');

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
(4, '6', '2024-11-29 09:46:27', 10490000.00, 'Pending', '03AAYGu2ToWi46gDy1N9xxv2BsaGhPG1MQaXcGCgnyU2_OLyk1wNUarZhBDglrIRo0PSyHrW9DnmGoFogVdhGdrNTSQa_9mU5a_lcdaRfDfJLmOGEGCwuNNPci6QcSRC6A9RcUvKnADY1B1yT0rI5fc5MpgkY6YI-0fM_sJO0xzHVxzU3UibxxjSNq0SdVHNKtk2eEjAPa_NT1xv1XJvo_4IOACzf4SqBTXZ59tXEAcbJV-8Tsmhy0_dOzwcXKKUvR7BOpuHzeowDqRKVdtDnooxzMsAt9chEFxSSQ5flmSg5tLp8wHAqy6SIA-Okhf1jTsCKm2YSe7K9YyarK0Hnmtr9Bp_Kev01X_KSRxhjqpW0BDXQMcpVxI5PnSVDfjsweHCKrwV3JM1Yflidv2Da5WAUf9aG_76UIGfgif4NHt5O31To3di75X7ym0VHimROsUaVXx9I36zA8mzLYwgJBnnFhrQqj5U8xv8JqN_XNiolsiOhY8tdzI1xCuBuoa4Pblmeq-0KDioTNlHhLUcgVFllJtn381VF2XEHR9dMdEyiR6r_rXFLUSiwOj_6cpIaAHbayr3OPFZHiZQf2_y6AzD4wT07nYtX4Ej1ai6O301eVlaMrLTh4FFwEzB--jwaCmEc8VHncz5rj', '3535C9', 'COD');

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
(5, 4, 6, 1, 10490000.00);

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
  `recovery_otp` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `real_name`, `email`, `phoneNumber`, `password`, `imgPath`, `role`, `isActive`, `recovery_otp`) VALUES
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
(25, 'root12as11', 'Nguyen Nama', 'nhatnguyencod1112er@hotmail.com', '0966901063', '0d61f26cc7dd5333177f446042de8437', 'https://cdn-icons-png.flaticon.com/512/6596/6596121.png', '0', 1, NULL);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
