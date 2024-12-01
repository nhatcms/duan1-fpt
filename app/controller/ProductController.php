<?php
// session_start();
require_once 'MainController.php';
require_once 'app/model/MainModel.php';
require_once 'app/model/AlertModel.php';

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

        require_once 'app/view/detail.php';
        if (isset($_POST['comment-btn'])) {
            $alert = new AlertModel();
		    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
			    $_SESSION['alert'] = 'Bạn cần đăng nhập để bình luận!';
			    $_SESSION['isSuccess'] = false;
            }else{
                $content = $_POST['comment-content'];
                $user_id = $_SESSION['user_id'];
                $CommentModel->addComment($user_id, $id, $content);
            }
            if(isset($_SESSION['isSuccess'])){
                if($_SESSION['isSuccess']){
                    $alert->showAlertWithRedirect('success', 'Thành công', $_SESSION['alert'], '?action=product&id='.$id);
                }else{
                    $alert->showAlert('warning', 'Thất bại', $_SESSION['alert']);
                }
                unset($_SESSION['alert']);
                unset($_SESSION['isSuccess']);
            }
        }
    }
}
$ProductController = new ProductController();
