<?php
require_once "AlertModel.php";
class CateModel extends MainModel
{
    public function __construct()
    {
        parent::__construct();

        $alert = new AlertModel();
    }

    public function getCateQuanlity()
    {
        $sql = "SELECT COUNT(*) AS quantity FROM categories";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result["quantity"];
    }

    public function getCateList()
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deleteCate($id)
    {
        if ($this->checkProductInCate($id)) {
            $_SESSION["alert"] = "Không thể xóa danh mục vì vẫn còn sản phẩm trong danh mục";
            $_SESSION["isSuccess"] = false;
        } else {
            $sql = "DELETE FROM categories WHERE id = $id";
            $stmt = $this->SUNNY->prepare($sql);
            $stmt->execute();
        }
    }

    public function addCate($cate_name)
    {
        $sql =
            "SELECT COUNT(*) AS quantity FROM categories WHERE cate_name = :cate_name";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->bindParam(":cate_name", $cate_name);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result["quantity"] > 0) {
            $_SESSION["alert"] = "Tên danh mục đã tồn tại";
        } else {
            $sql = "INSERT INTO categories(cate_name) VALUES(:cate_name)";
            $stmt = $this->SUNNY->prepare($sql);
            $stmt->bindParam(":cate_name", $cate_name);
            $stmt->execute();
            $_SESSION["alert"] = "Thêm danh mục mới thành công";
            $_SESSION["isSuccess"] = true;
        }
    }

    public function getCateById($id)
    {
        $sql = "SELECT * FROM categories WHERE id = '$id'";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function editCate($id, $cate_name)
    {
        $sql =
            "SELECT COUNT(*) AS quantity FROM categories WHERE cate_name = :cate_name";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->bindParam(":cate_name", $cate_name);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result["quantity"] > 0) {
            $_SESSION["alert"] = "Tên danh mục đã tồn tại";
        }else{
        $sql = "UPDATE categories SET cate_name = '$cate_name' WHERE id = '$id'";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute();
        $_SESSION["alert"] = "Sửa danh mục thành công";
        $_SESSION["isSuccess"] = true;
        }

    }

    public function checkProductInCate($id)
    {
        $sql = "SELECT COUNT(*) AS quantity FROM products WHERE cate_id = $id";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result["quantity"] > 0) {
            return true;
        } else {
            return false;
        }
    }
}
