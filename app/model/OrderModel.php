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

        return self::$db->lastInsertId(); 
    }

    public static function createOrderDetail($orderDetail)
    {
        
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
    public static function getOrderDetail($order_code)
    {
        self::dbConnect();
        $sql = "SELECT order_details.*, products.name as name, orders.order_code 
                FROM order_details 
                JOIN products ON order_details.product_id = products.id 
                JOIN orders ON order_details.order_id = orders.id 
                WHERE orders.order_code = :order_code"; // Thêm order_code vào SELECT
        $stmt = self::$db->prepare($sql);
        $stmt->execute([':order_code' => $order_code]); // Truyền order_code thay vì order_id
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //get orders by order code
    public static function getOrderByOrderCode($order_code)
    {
        
        self::dbConnect();
        $sql = "SELECT * FROM orders WHERE order_code = :order_code";
        $stmt = self::$db->prepare($sql);
        $stmt->execute([':order_code' => $order_code]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

    public static function getOrdersByUserId($user_id)
    {
        
        self::dbConnect();
        $sql = "SELECT * FROM orders WHERE user_id = :user_id ORDER BY date DESC";
        $stmt = self::$db->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getTotalSpent($user_id)
    {
        
        self::dbConnect();
        $sql = "SELECT SUM(total_amount) as total_spent FROM orders WHERE user_id = :user_id AND status != 'Cancelled'";
        $stmt = self::$db->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);
        //ép kiểu int
        return (int) $stmt->fetch(PDO::FETCH_ASSOC)['total_spent'];
    }
    public static function countOrdersByUserId($user_id)
    {
        
        self::dbConnect();
        $sql = "SELECT COUNT(*) as total_orders FROM orders WHERE user_id = :user_id";
        $stmt = self::$db->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);
        return (int) $stmt->fetch(PDO::FETCH_ASSOC)['total_orders'];
    }
    public static function countCompletedOrdersByUserId($user_id)
    {
        
        self::dbConnect();
        $sql = "SELECT COUNT(*) as total_orders FROM orders WHERE user_id = :user_id AND status = 'Delivered'";
        $stmt = self::$db->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);
        return (int) $stmt->fetch(PDO::FETCH_ASSOC)['total_orders'];
    }
}