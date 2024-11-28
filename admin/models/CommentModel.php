<?php

// class comment
class CommentModel extends MainModel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getCommentList()
    {
        $sql =
            "SELECT comments.*, products.name, users.real_name as user_name FROM comments INNER JOIN products ON comments.product_id = products.id INNER JOIN users ON comments.user_id = users.id";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function deleteComment($id)
    {
        $sql = "DELETE FROM comments WHERE id = $id";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->execute();
        //RETURN TO COMMENT PAGE
        header("Location: ?action=comment");
        //nếu thành công gán session isSucess = true, alert = xóa thành công
        $_SESSION["isSuccess"] = true;
        $_SESSION["alert"] = "Xóa bình luận thành công";
        return;
        
    }
    public function getCommentByProductId($product_id)
    {
        $sql = "SELECT comments.content, users.real_name AS author 
                FROM comments 
                JOIN users ON comments.user_id = users.id 
                WHERE comments.product_id = :product_id";
        $stmt = $this->SUNNY->prepare($sql);
        $stmt->bindParam(":product_id", $product_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
