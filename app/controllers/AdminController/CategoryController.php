<?php

namespace App\Controllers\AdminController;

use App\Models\AdminModel\Category;

class CategoryController
{
    protected $cat;
    public function __construct()
    {
        $this->cat = new Category();
    }
    public function listCat()
    {
        $cat = $this->cat->all();
        include('../../views/admin/category/alldanhmuc.php');
    }
    public function addCat()
    {
        include('../../views/admin/category/adddanhmuc.php');
        if (isset($_POST['adddanhmuc'])) {
            if (isset($_POST['adddanhmuc'])) {
                $trang_thai = $_POST['trang_thai'];
                $mo_ta = $_POST['mo_ta'];
                if ($_FILES['avt']['name'] != "") {
                    $avt = basename($_FILES["avt"]["name"]);
                    $target_dir = "../../../public/images/";
                    $target_file = $target_dir . $avt;
                    move_uploaded_file($_FILES["avt"]["tmp_name"], $target_file);
                } else {
                    $avt = "";
                }
                $ten_danh_muc = $_POST['ten_danh_muc'];
                $this->cat->add($ten_danh_muc, $mo_ta, $avt, $trang_thai);
                header("location:index.php?url=list-cat");
            }
        }
    }
    public function editCat()
    {
        $id = $_GET['id'];
        $editdm = $this->cat->detail($id);
        include('../../views/admin/category/editdanhmuc.php');
        if (isset($_POST["editdanhmuc"])) {
            $id_danh_muc = $_POST['id_danh_muc'];
            $trang_thai = $_POST['trang_thai'];
            $mo_ta = $_POST['mo_ta'];
            if ($_FILES['avt']['name'] != "") {
                $avt = basename($_FILES["avt"]["name"]);
                $target_dir = "../../../public/images/";
                $target_file = $target_dir . $avt;
                move_uploaded_file($_FILES["avt"]["tmp_name"], $target_file);
            } else {
                $avt = "";
            }
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $this->cat->edit($id_danh_muc, $ten_danh_muc, $mo_ta, $avt, $trang_thai);
            header("location:index.php?url=list-cat");
        }
    }
    public function deleteCat()
    {
        $id = $_GET['id'];
        $this->cat->delete($id);
        header("location:index.php?url=list-cat");
    }
}
// case 'alldanhmuc':
//             include('../../views/admin/danhmuc/alldanhmuc.php');
//             break;
//         case 'adddanhmuc':
//             include('../../views/admin/danhmuc/adddanhmuc.php');
//             if (isset($_POST['adddanhmuc'])) {
//                 if (isset($_POST['adddanhmuc'])) {
//                     $trang_thai = $_POST['trang_thai'];
//                     $mo_ta = $_POST['mo_ta'];
//                     if ($_FILES['avt']['name'] != "") {
//                         $avt = basename($_FILES["avt"]["name"]);
//                         $target_dir = "../../../public/images/";
//                         $target_file = $target_dir . $avt;
//                         move_uploaded_file($_FILES["avt"]["tmp_name"], $target_file);
//                     } else {
//                         $avt = "";
//                     }
//                     $ten_danh_muc = $_POST['ten_danh_muc'];
//                     adddanhmuc($ten_danh_muc, $mo_ta, $avt, $trang_thai);
//                     header("location:index.php?act=alldanhmuc&table=danh_muc_khoa_hoc");
//                 }
//             }

//             break;
//         case 'editdanhmuc':
//             include('../../views/admin/danhmuc/editdanhmuc.php');
//             if (isset($_POST["editdanhmuc"])) {
//                 $id_danh_muc = $_POST['id_danh_muc'];
//                 $trang_thai = $_POST['trang_thai'];
//                 $mo_ta = $_POST['mo_ta'];
//                 if ($_FILES['avt']['name'] != "") {
//                     $avt = basename($_FILES["avt"]["name"]);
//                     $target_dir = "../../../public/images/";
//                     $target_file = $target_dir . $avt;
//                     move_uploaded_file($_FILES["avt"]["tmp_name"], $target_file);
//                 } else {
//                     $avt = "";
//                 }
//                 $ten_danh_muc = $_POST['ten_danh_muc'];
//                 editdanhmuc($id_danh_muc, $ten_danh_muc, $mo_ta, $avt, $trang_thai);
//                 header("location:index.php?act=alldanhmuc&table=danh_muc_khoa_hoc");
//             }
//             break;