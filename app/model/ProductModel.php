<?php

require_once 'MainModel.php';

class ProductModel extends MainModel
{
    public static $SUNNY;
    public function __construct()
    {
        self::$SUNNY = $this->dbConnect();
    }

    // Get all products
    public static function getAllProducts()
    {
        $sql = "SELECT * FROM products";
        $stmt = self::$SUNNY->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    //get product by category
    public static function getProductByCategory($category)
    {
        $sql = "SELECT * FROM products WHERE cate_id = :category";
        $stmt = self::$SUNNY->prepare($sql);
        $stmt->execute([':category' => $category]);
        return $stmt->fetchAll();
    }

    //get product by category with limit
    public static function getProductByCategoryLimit($category, $limit)
    {
        $sql = "SELECT * FROM products WHERE cate_id = :category ORDER BY id DESC LIMIT :limit";
        $stmt = self::$SUNNY->prepare($sql);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    //get theo luong ban chay
    public static function getProductBySales()
    {
        $sql = "SELECT * FROM products ORDER BY sales DESC LIMIT 4";
        $stmt = self::$SUNNY->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Get product by id
    public static function getProductById($id)
    {
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = self::$SUNNY->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public static function searchProductByName($name)
    {
        $sql = "SELECT * FROM products WHERE name LIKE :name";
        $stmt = self::$SUNNY->prepare($sql);
        $stmt->execute([':name' => '%' . $name . '%']);
        return $stmt->fetchAll();
    }
    public static function getProductVariantByProductId($id)
    {
        $sql = "SELECT * FROM product_variants WHERE product_id = :id";
        $stmt = self::$SUNNY->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchAll();
    }
}
$ProductModel = new ProductModel();
