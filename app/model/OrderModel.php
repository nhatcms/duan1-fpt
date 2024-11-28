<?php
require_once 'MainModel.php';

class OrderModel extends MainModel
{
    protected static $db;

    public static function dbConnect()
    {
        self::$db = parent::dbConnect();
        return self::$db;
    }

    public static function createOrder($order)
    {
        // Kết nối cơ sở dữ liệu (sử dụng phương thức static)
        self::dbConnect();

        $sql = "INSERT INTO orders (user_id, total_amount, payment_method, address, order_code, status) 
                VALUES (:user_id, :total_amount, :payment_method, :address, :order_code, :status)";

        $stmt = self::$db->prepare($sql); 
        $stmt->execute([
            ':user_id' => $order['user_id'],
            ':total_amount' => $order['total_amount'],
            ':payment_method' => $order['payment_method'],
            ':address' => $order['address'],
            ':order_code' => $order['order_code'],
            ':status' => $order['status']
        ]);

        return self::$db->lastInsertId(); // Trả về ID của bản ghi vừa chèn vào
    }

    public static function createOrderDetail($orderDetail)
    {
        // Kết nối cơ sở dữ liệu (sử dụng phương thức static)
        self::dbConnect();

        $sql = "INSERT INTO order_details (order_id, product_id, quantity, price) 
                VALUES (:order_id, :product_id, :quantity, :price)";

        $stmt = self::$db->prepare($sql);
        $stmt->execute([
            ':order_id' => $orderDetail['order_id'],
            ':product_id' => $orderDetail['product_id'],
            ':quantity' => $orderDetail['quantity'],
            ':price' => $orderDetail['price']
        ]);
    }
}
