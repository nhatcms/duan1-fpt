# MobileLand - Website Bán Điện Thoại được thực hiện bởi nhóm 1

## Giới thiệu
**MobileLand** là một website thương mại điện tử chuyên cung cấp các dòng điện thoại di động chính hãng, với các sản phẩm từ các thương hiệu nổi tiếng Samsung. Tại MobileLand, khách hàng có thể tìm thấy những sản phẩm điện thoại chất lượng, giá cả hợp lý và dịch vụ hỗ trợ khách hàng tận tâm.

### Tính Năng Chính
- **Danh mục sản phẩm**: Tìm kiếm và duyệt qua các dòng điện thoại, từ cơ bản đến cao cấp.
- **Chi tiết sản phẩm**: Cung cấp thông tin chi tiết về từng sản phẩm, bao gồm cả những thông tin cơ bản.
- **Giỏ hàng và thanh toán**: Cho phép người dùng thêm sản phẩm vào giỏ hàng và thực hiện thanh toán trực tuyến (VNPAY) hoặc thanh toán khi nhận hàng (COD).
- **Đánh giá và bình luận**: Khách hàng có thể để lại đánh giá và bình luận về sản phẩm mà họ đã mua.
- **Sản phẩm liên quan**: Đề xuất các sản phẩm liên quan hoặc cùng loại để khách hàng có thể tham khảo thêm.

## Công Nghệ Sử Dụng
- **Frontend**: HTML, CSS, Bootstrap, JavaScript
- **Backend**: PHP, MySQL
- **Database**: MySQL
- **Framework**: PDO cho kết nối cơ sở dữ liệu

## Cài Đặt

### 1. Yêu Cầu Hệ Thống
- Web Server: Apache hoặc Nginx
- PHP >= 7.4
- MySQL hoặc MariaDB
- Trình duyệt web hiện đại

### 2. Cài Đặt Môi Trường

#### Cài Đặt PHP
- Đảm bảo rằng PHP đã được cài đặt và cấu hình trên máy chủ của bạn.

#### Cài Đặt Database
- Tạo cơ sở dữ liệu MySQL mới và nhập cấu trúc bảng từ file SQL trong thư mục `database`.
- Cập nhật thông tin kết nối cơ sở dữ liệu trong file cấu hình.

#### Cấu Hình Web Server
- Cấu hình Apache hoặc Nginx để chạy ứng dụng PHP.
- Đảm bảo các module PHP cần thiết được bật (PDO, MySQLi, etc.).

### 3. Chạy Ứng Dụng
- Chạy ứng dụng trên web server và truy cập vào `http://localhost` (hoặc địa chỉ bạn đã cấu hình).

## Hướng Dẫn Sử Dụng

### Đăng Ký và Đăng Nhập
- Người dùng có thể đăng ký tài khoản mới hoặc đăng nhập bằng tài khoản đã có để sử dụng các tính năng như mua hàng, đánh giá sản phẩm, v.v.

### Mua Hàng
- Duyệt qua các sản phẩm, chọn sản phẩm yêu thích và thêm vào giỏ hàng.
- Điền thông tin thanh toán và lựa chọn phương thức thanh toán.
- Xác nhận đơn hàng và nhận thông tin đơn hàng qua email.

### Quản Lý Sản Phẩm
- Quản trị viên có thể thêm, sửa, hoặc xóa sản phẩm từ hệ thống thông qua bảng điều khiển quản trị.

## Các Tính Năng Tương Lai
- Thêm tính năng so sánh sản phẩm.
- Cải thiện giao diện người dùng và trải nghiệm người dùng.
- Hỗ trợ thanh toán trực tuyến qua các cổng thanh toán như Stripe, PayPal.

## Liên Hệ
- Email: admin@nhatnguyen.tech
- Website: [https://mobileland.nhatnguyen.tech](https://mobileland.nhatnguyen.tech)

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

