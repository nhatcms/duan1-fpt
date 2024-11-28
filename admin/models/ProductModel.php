<?php
require_once "AlertModel.php";
class ProductModel extends MainModel
{
    public function __construct()
    {
        $alert = new AlertModel();
        parent::__construct();
    }
    public function getProductQuanlity()
    {
        $sql = "SELECT COUNT(*) AS quantity FROM products";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result["quantity"];
    }
    public function getProductList()
    {
        $sql =
            "SELECT products.*, categories.cate_name FROM products INNER JOIN categories ON products.cate_id = categories.id";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getProductById($id)
    {
        $sql = "SELECT * FROM products WHERE id = $id";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function addProduct(
        $name,
        $price,
        $list_price,
        $img,
        $description,
        $cate_id,
        $isActive
    ) {
        $target_dir = "../assets/img/";

        $file_info = new finfo(FILEINFO_MIME_TYPE);
        $mime_type = $file_info->file($_FILES["img"]["tmp_name"]);
        $mime_to_extension = [
            "image/jpeg" => "jpg",
            "image/png" => "png",
            "image/gif" => "gif",
        ];
        $file_extension = $mime_to_extension[$mime_type] ?? null;

        if (!$file_extension) {
            $alert = new AlertModel();
            $alert->showAlert(
                "error",
                "Loại file không được hỗ trợ.",
                "Chỉ hỗ trợ JPG, PNG, GIF."
            );
            exit();
        }

        $random_file_name = uniqid() . "." . $file_extension;
        $target_file = $target_dir . $random_file_name;

        if (!move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
            $alert = new AlertModel();
            $alert->showAlert(
                "error",
                "Không thể tải file lên.",
                "Vui lòng thử lại sau."
            );
            exit();
        }

        $sql = "INSERT INTO products (name, price,list_price, img, description, cate_id, isActive) 
                VALUES (:name, :price, :list_price, :img, :description, :cate_id, :isActive)";
        $stmt = $this->SUNNY->prepare($sql);

        $price = (float) $price;
        $list_price = (float) $list_price;

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":list_price", $list_price);
        $stmt->bindParam(":img", $random_file_name);
        $stmt->bindParam(":cate_id", $cate_id);
        $stmt->bindParam(":isActive", $isActive);

        if ($stmt->execute()) {
            $_SESSION["isSuccess"] = true;
            $_SESSION["alert"] = "Thêm sản phẩm mới thành công";
        } else {
            $_SESSION["isSuccess"] = false;
            $_SESSION["alert"] =
                "Đã xảy ra lỗi khi thêm sản phẩm vào cơ sở dữ liệu.";
        }
    }

    public function editProduct(
        $id,
        $name,
        $price,
        $list_price,
        $prod_img_name,
        $description,
        $cate_id,
        $isActive
    ) {
        if ($price < 0 || $list_price < 0) {
            $alert->showAlert(
                "error",
                "Giá sản phẩm không được âm",
                "Vui lòng nhập lại giá sản phẩm."
            );
        }

        $sql = "UPDATE products SET 
            name = :name, 
            price = :price, 
            list_price = :list_price, 
            img = :img, 
            description = :description, 
            cate_id = :cate_id, 
            isActive = :isActive 
            WHERE id = :id";

        $stmt = $this->SUNNY->prepare($sql);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":price", $price);
        $stmt->bindParam(":list_price", $list_price);
        $stmt->bindParam(":img", $prod_img_name);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":cate_id", $cate_id);
        $stmt->bindParam(":isActive", $isActive);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $_SESSION["isSuccess"] = true;
        $_SESSION["alert"] = "Cập nhật sản phẩm thành công.";
        }
}
