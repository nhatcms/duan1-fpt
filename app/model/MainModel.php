<?php
require_once "AccountModel.php";
require_once "ProductModel.php";
require_once "CategoryModel.php";
require_once "BannerModel.php";
require_once "CommentModel.php";
class MainModel
{
    // public $SUNNY;
    function __construct()
    {
        // $this->SUNNY = $this->dbConnect();
    }
    public function dbConnect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dam"; // Định nghĩa tên cơ sở dữ liệu
    
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
            die();
        }
        return $conn;
    }

}
// create a new model
$Model = new MainModel();
