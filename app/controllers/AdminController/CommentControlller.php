<?php

namespace App\Controllers\AdminController;

use App\Controllers\ClientController\BaseController;
use App\Models\AdminModel\Comment;

class CommentControlller extends BaseController
{
    public $comment;
    public function __construct()
    {
        $this->comment = new Comment();
    }
    public function listCommentCtl()
    {
        $comment = $this->comment->listComment();
        $this->render('admin.comment.list-comments', compact('comment'));
    }
    public function listRateCtl()
    {
        $rate = $this->comment->listRate();
        // var_dump($rate);
        $this->render('admin.comment.list-rates', compact('rate'));
    }
    public function deleteComment($id)
    {
        $this->comment->delete($id);
        header('location: ' . BASE_URL . 'admin/comments/list-comments');
    }
}
