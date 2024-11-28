<?php
// session_start();
require_once 'MainController.php';
require_once 'app/model/MainModel.php';

class ProductController extends MainController
{
    public function __construct()
    {
        parent::__construct(); // Nếu `MainController` có constructor
    }
    public static function productController()
    {
        $Model = new ProductModel();
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        $product = $Model->getProductById($id);
        $cate_id = $product['cate_id'];
        $relatedProducts = $Model->getProductByCategoryLimit($product['cate_id'], 4);
        $CommentModel = new CommentModel();
        $comments = $CommentModel->getComments($id);
        $productVariants = $Model->getProductVariantByProductId($id);

        require_once 'app/view/detail.php';
        if (isset($_POST['comment-btn'])) {
            $content = $_POST['comment-content'];
            $user_id = $_SESSION['user_id'];
            $CommentModel->addComment($user_id, $id, $content);
            echo "<script>window.location.href='?action=product&id=$id'</script>";
        }
        //lấy biến thể của sản phẩm ở bảng product_variants bằng hàm getProductVariantByProductId
    }
}
$ProductController = new ProductController();
