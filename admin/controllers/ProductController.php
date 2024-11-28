<?php
require_once "models/ProductModel.php";
require_once "models/AuthModel.php";
require_once "models/CateModel.php";
require_once "models/AlertModel.php";
require_once "models/CommentModel.php";

class ProductController
{
    public function __construct()
    {
    }
    public static function productController()
    {
        $authModel = new AuthModel();
        $authModel->check_login();
        $productModel = new ProductModel();
        $products = $productModel->getProductList();
        require_once "views/product.php";
    }

    public static function addProductController()
    {
        $authModel = new AuthModel();
        $authModel->check_login();

        $errors = [];
        $oldInput = []; // Lưu lại dữ liệu cũ để giữ nguyên các trường đã nhập

        if (isset($_POST["add-prod-btn"])) {
            $oldInput = $_POST; // Lưu dữ liệu đã nhập
            $name = $_POST["name"];
            $cate = $_POST["cate_id"];
            $des = $_POST["description"];
            $price = $_POST["price"];
            $list_price = $_POST["list_price"];
            $img = $_FILES["img"];
            $img_name = $img["name"];
            $isActive = $_POST["isActive"];

            // Validate giá không âm và giá bán phải rẻ hơn giá niêm yết
            if ($price < 0 || $list_price < 0) {
                $errors[] = "Giá sản phẩm không được âm.";
            }
            if ($price >= $list_price) {
                $errors[] = "Giá bán phải nhỏ hơn giá niêm yết.";
            }

            if (empty($errors)) {
                $productModel = new ProductModel();
                $productModel->addProduct(
                    $name,
                    $price,
                    $list_price,
                    $img_name,
                    $des,
                    $cate,
                    $isActive
                );

                header("Location: ?action=product");
                exit();
            }
        }

        $cateModel = new CateModel();
        $cates = $cateModel->getCateList();

        // Truyền dữ liệu lỗi và input cũ tới view
        require_once "views/add-product.php";
    }

    public static function editProductController($id)
    {
        $authModel = new AuthModel();
        $authModel->check_login();
        $productModel = new ProductModel();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = $_POST["name"];
            $cate = $_POST["cate_id"];
            $des = $_POST["description"];
            $price = $_POST["price"];
            $list_price = $_POST["list_price"];
            $prod_img_name = $_FILES["img"]["name"];
            $isActive = $_POST["isActive"];
            $uploaded_image = null;

            if ($price < 0 || $list_price < 0) {
                $_SESSION["isSuccess"] = false;
                $_SESSION["alert"] = "Giá sản phẩm không được âm.";
                header("Location: ?action=editProduct&id=$id");
                return;
            }
            if ($price >= $list_price) {
                $_SESSION["isSuccess"] = false;
                $_SESSION["alert"] = "Giá bán phải nhỏ hơn giá niêm yết.";
                header("Location: ?action=editProduct&id=$id");
                return;
            }

            // Xử lý tải lên ảnh
            if (!empty($prod_img_name)) {
                $target_dir = "../assets/img/";
                $file_extension = pathinfo($prod_img_name, PATHINFO_EXTENSION);
                $valid_extensions = ["jpg", "jpeg", "png", "gif"];

                if (!in_array(strtolower($file_extension), $valid_extensions)) {
                    $_SESSION["isSuccess"] = false;
                    $_SESSION["alert"] =
                        "File tải lên phải là ảnh (jpg, jpeg, png, gif).";
                    return;
                }

                $random_file_name = uniqid() . "." . $file_extension;
                $target_file = $target_dir . $random_file_name;

                if (
                    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)
                ) {
                    $uploaded_image = $random_file_name;
                } else {
                    $_SESSION["isSuccess"] = false;
                    $_SESSION["alert"] = "Không thể tải file lên.";
                    header("Location: ?action=editProduct&id=$id");
                    return;
                }
            } else {
                $uploaded_image = $productModel->getProductById($id)["img"];
            }

            // Cập nhật sản phẩm với ảnh mới
            $productModel->editProduct(
                $id,
                $name,
                $price,
                $list_price,
                $uploaded_image,
                $des,
                $cate,
                $isActive
            );
            header("Location: ?action=editProduct&id=$id");
            exit();
        }

        $product = $productModel->getProductById($id);

        $cateModel = new CateModel();
        $cates = $cateModel->getCateList();
        $commentModel = new CommentModel();
        $comments = $commentModel->getCommentByProductId($id);

        require_once "views/edit-product.php";
    }
}
