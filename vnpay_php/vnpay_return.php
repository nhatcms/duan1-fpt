<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>VNPAY RESPONSE</title>
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .container {
            max-width: 700px;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .header h3 {
            color: #007bff;
        }
        .form-group label {
            font-weight: 600;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
            font-weight: 500;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .btn-home {
            background-color: #007bff;
            color: white;
            font-weight: 600;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: #6c757d;
        }
    </style>
</head>
<body>

<?php
session_start();
require_once("./config.php");
$vnp_SecureHash = $_GET['vnp_SecureHash'];
$inputData = array();
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}

unset($inputData['vnp_SecureHash']);
ksort($inputData);
$i = 0;
$hashData = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
}

$secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
?>

<div class="container">
    <div class="header clearfix">
        <h3 class="text-muted text-center">Hoá đơn thanh toán tại Mobileland</h3>
    </div>

    <div class="form-group">
        <label>Mã thanh toán:</label>
        <label><?php echo $_GET['vnp_TxnRef'] ?></label>
    </div>    
    <div class="form-group">
        <label>Số tiền:</label>
        <label><?php echo number_format($_GET['vnp_Amount'] / 100,0) ?> ₫</label>
    </div>  
    <div class="form-group">
        <label>Nội dung thanh toán:</label>
        <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
    </div> 
    <!-- <div class="form-group">
        <label>Mã phản hồi (vnp_ResponseCode):</label>
        <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
    </div>  -->
    <!-- <div class="form-group">
        <label>Mã GD Tại VNPAY:</label>
        <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
    </div>  -->
    <div class="form-group">
        <label>Mã Ngân hàng:</label>
        <label><?php echo $_GET['vnp_BankCode'] ?></label>
    </div> 
    <div class="form-group">
        <label>Thời gian thanh toán:</label>
        <label>
            <?php 
            $payDate = DateTime::createFromFormat('YmdHis', $_GET['vnp_PayDate']);
            echo $payDate->format('d/m/Y H:i:s'); 
            ?>
        </label>
    </div> 

    <div class="result">
        <label>Kết quả:</label>
        <p>
            <?php
            if ($secureHash == $vnp_SecureHash) {
                if ($_GET['vnp_ResponseCode'] == '00') {
                    echo "<span class='success'>GD Thành công</span>";
                } else {
                    echo "<span class='error'>GD Không thành công</span>";
                }
            } else {
                echo "<span class='error'>Chữ ký không hợp lệ</span>";
            }
            ?>
        </p>
    </div>

    <form action="../?action=history" method="post" class="text-center">
        <?php if ($_GET['vnp_ResponseCode'] == '00') { ?>
            <button type="submit" class="btn btn-home btn-lg" name="order-btn">Xem lịch sử đơn hàng</button>
        <?php } else { ?>
            <a href="../?action=cart" class="btn btn-home btn-lg">Quay về giỏ hàng</a>
        <?php } ?>
    </form>

    <footer class="footer">
        <p>&copy; Mobileland <?php echo date('Y')?></p>
    </footer>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
<?php
// Kiểm tra kết quả thanh toán từ VNPAY (Giả sử bạn đã nhận được dữ liệu từ VNPAY)
if ($_GET['vnp_ResponseCode'] == '00') {  // Ví dụ: mã phản hồi thành công từ VNPAY
    // Lấy thông tin đơn hàng từ session
    $orderInfo = $_SESSION['order_info'];
    
    // Kết nối cơ sở dữ liệu
    // Kết nối tới cơ sở dữ liệu với UTF-8
    $pdo = new PDO("mysql:host=localhost;dbname=dam", "root", "", [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ]);

    // Thiết lập chế độ báo lỗi
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Thêm đơn hàng vào bảng orders
    $stmt = $pdo->prepare("INSERT INTO orders (user_id, date, total_amount, status, address, order_code, payment_method) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_SESSION['user_id'],
        $orderInfo['date'],
        $orderInfo['total']-30000, 
        'Pending',
        $orderInfo['address'],
        strtoupper(substr(md5(uniqid()), 0, 6)),
        $orderInfo['payment_method']
    ]);

    $orderId = $pdo->lastInsertId();

    foreach ($orderInfo['cart'] as $item) {
        $stmt = $pdo->prepare("INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $orderId,
            $item['id'], 
            $item['quantity'],
            $item['price']
        ]);
    }


    // Xóa giỏ hàng sau khi thanh toán thành công
    unset($_SESSION['cart']);
    unset($_SESSION['order_info']);
    
    // echo '<script>alert("Thanh toán thành công!"); window.location.href = "thank_you.php";</script>';
}
?>
