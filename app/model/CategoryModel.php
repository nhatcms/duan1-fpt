<?php
require_once 'MainModel.php';

class CategoryModel extends MainModel
{
    public static $SUNNY;
    public function __construct()
    {
        self::$SUNNY = $this->dbConnect();
    }
    // Get all categories
    public static function getAllCategories()
    {
        $sql = "SELECT * FROM categories";
        $stmt = self::$SUNNY->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Get all cate with linked product
    public static function getAllCategoriesWithProducts()
    {
        $sql = "SELECT c.id AS category_id, c.cate_name AS category_name, 
                   p.id AS product_id, p.name AS product_name, 
                   p.price AS product_price, p.list_price AS product_list_price, 
                   p.img AS product_image, p.description AS product_description
            FROM categories c
            LEFT JOIN products p ON c.id = p.cate_id
            WHERE p.id IS NOT NULL
            ORDER BY c.cate_name, p.id DESC"; // Order by category and product ID in descending order

        $stmt = self::$SUNNY->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Group results by category_name and limit to 4 products per category
        $categories = [];
        foreach ($results as $row) {
            $categoryName = $row['category_name'];
            if (!isset($categories[$categoryName])) {
                $categories[$categoryName] = [];
            }
            if (count($categories[$categoryName]) < 4) {
                $categories[$categoryName][] = [
                    'product_id' => $row['product_id'],
                    'product_name' => $row['product_name'],
                    'product_price' => $row['product_price'],
                    'product_list_price' => $row['product_list_price'],
                    'product_image' => $row['product_image'],
                    'product_description' => $row['product_description']
                ];
            }
        }
        return $categories;
    }
    public static function getCategoryById($id){
        $sql = "SELECT * FROM categories WHERE id = $id";
        $stmt = self::$SUNNY->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
}
$CategoryModel = new CategoryModel();
