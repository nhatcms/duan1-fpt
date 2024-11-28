<?php
require_once 'MainModel.php';
class BannerModel extends MainModel
{
    // call the parent constructor
    public static $SUNNY;
    public function __construct()
    {
        self::$SUNNY = $this->dbConnect();
    }
    // get all banners with order by id asc
    public static function getBanner()
    {
        $sql = "SELECT * FROM banners ORDER BY id ASC";
        $stmt = self::$SUNNY->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
}
$BannerModel = new BannerModel();
