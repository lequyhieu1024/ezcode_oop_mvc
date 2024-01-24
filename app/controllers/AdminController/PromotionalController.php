<?php

namespace App\Controllers\AdminController;

use App\Models\AdminModel\Promotional;

class PromotionalController
{
    public $promotional;
    public function __construct()
    {
        $this->promotional = new Promotional();
    }
    public function listPromotional()
    {
        $promotional = $this->promotional->list();
        include('../../views/admin/Promotional/allkhuyenmai.php');
    }
    public function addPromotional()
    {
        include('../../views/admin/promotional/addkhuyenmai.php');
        if (isset($_POST["addkhuyenmai"])) {
            $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $noi_dung = $_POST['noi_dung'];
            if ($_FILES['avt']['name'] != "") {
                $avt = basename($_FILES["avt"]["name"]);
                $target_dir = "../../../public/images/";
                $target_file = $target_dir . $avt;
                move_uploaded_file($_FILES["avt"]["tmp_name"], $target_file);
            } else {
                $avt = "";
            }
            $this->promotional->add($ngay_bat_dau, $ngay_ket_thuc, $ten_khuyen_mai, $noi_dung, $avt);
            echo '<h2 style="color: red">Thêm thành công!</h2>';
        }
    }
    public function editPromotional()
    {
        $id = $_GET['id'];
        $promotional = $this->promotional->detail($id);
        include('../../views/admin/promotional/editkhuyenmai.php');
        if (isset($_POST["editkhuyenmai"])) {
            $id_khuyen_mai = $_POST['id_khuyen_mai'];
            $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            $noi_dung = $_POST['noi_dung'];
            if ($_FILES['avt']['name'] != "") {
                $avt = basename($_FILES["avt"]["name"]);
                $target_dir = "../../../public/images/";
                $target_file = $target_dir . $avt;
                move_uploaded_file($_FILES["avt"]["tmp_name"], $target_file);
            } else {
                $avt = "";
            }
            $this->promotional->edit($id_khuyen_mai, $ngay_bat_dau, $ngay_ket_thuc, $ten_khuyen_mai, $noi_dung, $avt);
            header("location:index.php?url=list-promotional");
        }
    }
    public function deletePromotional()
    {
        $id = $_GET['id'];
        $this->promotional->delete($id);
        header("location:index.php?url=list-promotional");
    }
}
