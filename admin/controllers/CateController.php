<?php
require_once "models/Main.php";

class CateController
{   
    public function __construct()
    {
    }
    public static function cateController()
    {
        $authModel = new AuthModel();
        $authModel->check_login();
        $cateModel = new CateModel();
        $cates = $cateModel->getCateList();
        require_once "views/cate.php";
    }

    public static function deleteCateController($id)
    {
        $authModel = new AuthModel();
        $authModel->check_login();
        $cateModel = new CateModel();

        if ($cateModel->checkProductInCate($id)) {
            echo json_encode([
                "status" => "error",
                "message" => "Không thể xóa danh mục còn chứa sản phẩm",
            ]);
            exit();
        } else {
            $cateModel->deleteCate($id);
            echo json_encode([
                "status" => "success",
                "message" => "Danh mục đã được xóa thành công",
            ]);
            exit();
        }
    }

    public static function addCateController()
    {
        $authModel = new AuthModel();
        $authModel->check_login();
        if (isset($_POST["add-cate-btn"])) {
            $cate_name = $_POST["cate_name"];
            $cateModel = new CateModel();
            $cateModel->addCate($cate_name);

            header("Location: ?action=cate");
        }
        require_once "views/add-cate.php";
    }

    public static function editCateController($id)
    {
        $authModel = new AuthModel();
        $authModel->check_login();
        $cateModel = new CateModel();
        $cate = $cateModel->getCateById($id);
        if (isset($_POST["edit-cate-btn"])) {
            $cate_id = $_POST["id"];
            $cate_name = $_POST["cate_name"];
            $cateModel->editCate($cate_id, $cate_name);
            header("Location: ?action=cate");
        }
        require_once "views/edit-cate.php";
    }
}
