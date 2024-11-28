<?php
require_once "models/AuthModel.php";
require_once "models/CateModel.php";
require_once "models/ProductModel.php";
require_once "models/UserModel.php";
require_once "models/CommentModel.php";
require_once "models/AlertModel.php";
require_once "models/OrderModel.php";

class MainModel
{
    public $SUNNY;
    public function __construct()
    {
        $this->SUNNY = $this->connect_db();
    }
    public function connect_db()
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
$MainModel = new MainModel();
