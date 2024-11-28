<?php
require_once 'MainModel.php';

class SearchModel extends MainModel
{
    public static $SUNNY;
    public function __construct()
    {
        self::$SUNNY = $this->dbConnect();
    }

    // Search product by name
    public static function searchProductByName($keyword)
    {
        // lower keyword
        $keyword = strtolower($keyword);
        $sql = "SELECT * FROM products WHERE name LIKE :keyword";
        $stmt = self::$SUNNY->prepare($sql);
        $stmt->execute([':keyword' => "%$keyword%"]);
        return $stmt->fetchAll();
    }
}
