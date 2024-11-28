<?php
session_start();
//check nếu chưa có session thì block truy cập
if (!isset($_SESSION["role"]) || $_SESSION["role"] != "1") {
    echo "Cộng hoà xã hội chủ nghĩa Việt Nam quang vinh muôn năm";
    exit;
}

$dsn = "mysql:host=localhost;dbname=dam;charset=utf8";
$username = "root";
$password = "";
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$conn = new PDO($dsn, $username, $password, $options);

$order_code = isset($_GET['order_code']) ? $_GET['order_code'] : '';


$sql = "SELECT orders.*, users.real_name AS user_name FROM orders 
    JOIN users ON orders.user_id = users.id 
    WHERE order_code LIKE :order_code 
    ORDER BY date DESC";

$stmt = $conn->prepare($sql);
$stmt->execute([':order_code' => "%$order_code%"]);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($orders as $order) {
    echo "<tr>
            <td>{$order['order_code']}</td>
            <td>{$order['user_name']}</td>
            <td>" . number_format($order['total_amount']) . "</td>
            <td>{$order['date']}</td>
            <td>
              <span class='badge bg-" . ($order['status'] == 'Processing' ? 'warning text-dark' : ($order['status'] == 'Completed' ? 'success' : 'danger')) . "'>
                {$order['status']}
              </span>
            </td>
            <td>
              <a href='?action=editProduct&id={$order['id']}' class='btn btn-warning'>
                <i class='bi bi-eye'></i> Chi tiết
              </a>
            </td>
          </tr>";
}
