<?php

namespace App\Controllers\AdminController;

use App\Models\AdminModel\Comment;

class CommentControlller
{
    public $comment;
    public function __construct()
    {
        $this->comment = new Comment();
    }
    public function listCommentCtl()
    {
        $comment = $this->comment->listComment();
        include('../../views/admin/comment/allbinhluan.php');
    }
    public function listRateCtl()
    {
        $rate = $this->comment->listRate();
        // var_dump($rate);
        include('../../views/admin/comment/alldanhgia.php');
    }
    public function deleteComment()
    {
        $id = $_GET['id'];
        $this->comment->delete($id);
        header('location: index.php?url=list-comment');
    }
}
