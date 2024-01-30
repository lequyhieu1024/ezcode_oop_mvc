<?php

namespace App\Controllers\AdminController;

use App\Controllers\ClientController\BaseController;
use App\Models\AdminModel\Category;

class CategoryController extends BaseController
{
    protected $cat;
    public function __construct()
    {
        $this->cat = new Category();
    }
    public function listCat()
    {
        $cat = $this->cat->all();
        $this->render('admin.category.list-categories', compact('cat'));
    }
    public function addCat()
    {
        $this->render('admin.category.add-category');
        if (isset($_POST['adddanhmuc'])) {
            if (isset($_POST['adddanhmuc'])) {
                $trang_thai = $_POST['trang_thai'];
                $mo_ta = $_POST['mo_ta'];
                if ($_FILES['avt']['name'] != "") {
                    $avt = basename($_FILES["avt"]["name"]);
                    $target_dir = "public/images/";
                    $target_file = $target_dir . $avt;
                    move_uploaded_file($_FILES["avt"]["tmp_name"], $target_file);
                } else {
                    $avt = "";
                }
                $ten_danh_muc = $_POST['ten_danh_muc'];
                $this->cat->add($ten_danh_muc, $mo_ta, $avt, $trang_thai);
                header("location:" . BASE_URL . "admin/categories/list-cat");
            }
        }
    }
    public function editCat($id)
    {
        $editdm = $this->cat->detail($id);
        $this->render('admin.category.edit-category', compact('editdm'));
        if (isset($_POST["editdanhmuc"])) {
            $id_danh_muc = $_POST['id_danh_muc'];
            $trang_thai = $_POST['trang_thai'];
            $mo_ta = $_POST['mo_ta'];
            if ($_FILES['avt']['name'] != "") {
                $avt = basename($_FILES["avt"]["name"]);
                $target_dir = "public/images/";
                $target_file = $target_dir . $avt;
                move_uploaded_file($_FILES["avt"]["tmp_name"], $target_file);
            } else {
                $avt = "";
            }
            unlink("public/images/" . $editdm['avt']);
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $this->cat->edit($id_danh_muc, $ten_danh_muc, $mo_ta, $avt, $trang_thai);
            header("location:" . BASE_URL . "admin/categories/list-cat");
        }
    }
    public function deleteCat($id)
    {
        $category = $this->cat->detail($id);
        unlink("public/images/" . $category['avt']);
        $this->cat->delete($id);
        header("location:" . BASE_URL . "admin/categories/list-cat");
    }
}
