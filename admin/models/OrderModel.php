<?php
class OrderModel extends MainModel{
    public function __construct()
    {
        parent::__construct();

        $alert = new AlertModel();
    }
    public function getAllOrder()
    {
        $sql = "SELECT orders.*, users.real_name AS user_name 
                FROM orders 
                JOIN users ON orders.user_id = users.id";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getOrderById($id)
    {
        $sql = "SELECT orders.*, users.real_name AS user_name 
                FROM orders 
                JOIN users ON orders.user_id = users.id 
                WHERE orders.id = :id";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    //edit order
    public function editOrder($id, $status, $address)
    {
        $sql = "UPDATE orders SET status = :status, address = :address WHERE id = :id";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":address", $address);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt;
    }
    public function getOrderDetail($id)
    {
        $sql = "SELECT order_details.*, products.name as name, orders.id 
                FROM order_details 
                JOIN products ON order_details.product_id = products.id 
                JOIN orders ON order_details.order_id = orders.id 
                WHERE orders.id = :id";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function countOrder()
    {
        $sql = "SELECT COUNT(*) as total FROM orders";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) $result['total'];
    }
    //lấy tỷ lệ đơn hoàn thành
    public function getPercentOrder()
    {
        $sql = "SELECT COUNT(*) as total FROM orders WHERE status = 'Delivered'";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $total = $this->countOrder();
        if ($total == 0) {
            return 0;
        }
        return round(($result['total'] / $total) * 100, 2);
    }
    public function getCompletedOrderRenueve()
    {
        $sql = "SELECT SUM(total_amount) as total FROM orders WHERE status = 'Delivered'";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

}