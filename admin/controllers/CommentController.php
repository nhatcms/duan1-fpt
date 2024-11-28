<?php
require_once "models/CommentModel.php";
require_once "models/AuthModel.php";

class CommentController
{
    public function __construct()
    {
    }
    public static function showCommentController()
    {
        $authModel = new AuthModel();
        $authModel->check_login();
        $commentModel = new CommentModel();
        $comments = $commentModel->getCommentList();
        require_once "views/comment.php";
    }

    public static function deleteCommentController($id)
    {
        $authModel = new AuthModel();
        $authModel->check_login();
        $commentModel = new CommentModel();
        $id = $_GET["id"];
        $commentModel->deleteComment($id);

    }
}
