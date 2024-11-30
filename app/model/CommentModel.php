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
	public static function addComment($user_id, $product_id, $content)
	{

		$sqlCheckPurchase = "
			SELECT COUNT(*) 
			FROM `orders`
			INNER JOIN `order_details` ON `orders`.id = `order_details`.order_id
			WHERE `orders`.user_id = :user_id AND `order_details`.product_id = :product_id
		";
		$stmtCheck = self::$SUNNY->prepare($sqlCheckPurchase);
		$stmtCheck->execute([':user_id' => $user_id, ':product_id' => $product_id]);
		$hasPurchased = $stmtCheck->fetchColumn();
		if ($hasPurchased == 0) {
			$_SESSION['alert'] = 'Bạn cần mua sản phẩm này để bình luận!';
			$_SESSION['isSuccess'] = false;
			return;
		}

		$sqlCheckComment = "
			SELECT COUNT(*) 
			FROM comments 
			WHERE user_id = :user_id AND product_id = :product_id
		";
		$stmtCheckComment = self::$SUNNY->prepare($sqlCheckComment);
		$stmtCheckComment->execute([':user_id' => $user_id, ':product_id' => $product_id]);
		$hasCommented = $stmtCheckComment->fetchColumn();

		if ($hasCommented > 0) {
			$_SESSION['alert'] = 'Mỗi sản phẩm chỉ được bình luận 1 lần!';
			$_SESSION['isSuccess'] = false;
			return;
		}
		try {
			$sql = "INSERT INTO comments (user_id, product_id, content, post_time) VALUES (:user_id, :product_id, :content, NOW())";
			$stmt = self::$SUNNY->prepare($sql);
			$stmt->execute([':product_id' => $product_id, ':user_id' => $user_id, ':content' => $content]);
			$_SESSION['alert'] = 'Bình luận đã được thêm thành công!';
			$_SESSION['isSuccess'] = true;
		} catch (PDOException $e) {
			$_SESSION['alert'] = 'Thêm bình luận thất bại, vui lòng thử lại sau!';
			$_SESSION['isSuccess'] = false;
		}
}

	


}
$CommentModel = new CommentModel();
