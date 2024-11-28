<?php
require_once 'MainModel.php';
class CommentModel extends MainModel
{
    // call the parent constructor
    public static $SUNNY;
    public function __construct()
    {
        self::$SUNNY = $this->dbConnect();
    }
    // get all banners with order by id asc
    // public static function getComments($id)
    // {
    //     $sql = "SELECT * FROM comments WHERE product_id = :id";
    //     $stmt = self::$SUNNY->prepare($sql);
    //     $stmt->execute([':id' => $id]);
    //     $result = $stmt->fetchAll();
    //     return $result;
    // }
    //getCommentsWithUsername
    public static function getComments($id)
    {
        $sql = "SELECT comments.*, users.real_name FROM comments INNER JOIN users ON comments.user_id = users.id WHERE comments.product_id = :id";
        $stmt = self::$SUNNY->prepare($sql);
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetchAll();
        return $result;
    }
    // add a new comment
    public static function addComment($user_id, $product_id, $content)
    {
        //check login
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true) {
            echo "<script>alert('Bạn cần đăng nhập để bình luận!')</script>";
            return;
        } else {
            $sql = "INSERT INTO comments (user_id, product_id, content) VALUES (:user_id, :product_id, :content)";
            $stmt = self::$SUNNY->prepare($sql);
            $stmt->execute([':product_id' => $product_id, ':user_id' => $user_id, ':content' => $content]);
        }
    }
}
$CommentModel = new CommentModel();
