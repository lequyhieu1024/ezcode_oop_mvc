<?php

namespace App\Controllers\AdminController;

use App\Models\AdminModel\Teacher;

class TeacherController
{
    protected $teacher;
    public function __construct()
    {
        $this->teacher = new Teacher();
    }
    public function listTeacher()
    {
        $teachers = $this->teacher->list();
        include('../../views/admin/teacher/allgiangvien.php');
    }
    public function addTeacher()
    {
        include('../../views/admin/teacher/addgiangvien.php');
        if (isset($_POST["addgiangvien"])) {
            $ma_giang_vien = $_POST['ma_giang_vien'];
            $ten_giang_vien = $_POST['ten_giang_vien'];
            $email = $_POST['email'];
            $nam_sinh = $_POST['nam_sinh'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            if ($_FILES['avt']['name'] != "") {
                $avt = basename($_FILES["avt"]["name"]);
                $target_dir = "../../../public/images/";
                $target_file = $target_dir . $avt;
                move_uploaded_file($_FILES["avt"]["tmp_name"], $target_file);
            } else {
                $avt = "";
            }
            $mo_ta = $_POST['mo_ta'];
            $this->teacher->add($ma_giang_vien, $ten_giang_vien, $email, $avt, $so_dien_thoai, $mo_ta, $nam_sinh);
            echo '<h2 style="color: red">Thêm thành công!</h2>';
        }
    }
    public function editTeacher()
    {
        $id = $_GET['id'];
        $teacher = $this->teacher->detail($id);
        include('../../views/admin/teacher/editgiangvien.php');
        if (isset($_POST["editgiangvien"])) {
            $id_giang_vien = $_POST['id_giang_vien'];
            $ma_giang_vien = $_POST['ma_giang_vien'];
            $ten_giang_vien = $_POST['ten_giang_vien'];
            $email = $_POST['email'];
            $nam_sinh = $_POST['nam_sinh'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            if ($_FILES['avt']['name'] != "") {
                $avt = basename($_FILES["avt"]["name"]);
                $target_dir = "../../../public/images/";
                $target_file = $target_dir . $avt;
                move_uploaded_file($_FILES["avt"]["tmp_name"], $target_file);
            } else {
                $avt = "";
            }
            $mo_ta = $_POST['mo_ta'];
            $this->teacher->edit($id_giang_vien, $ma_giang_vien, $ten_giang_vien, $email, $avt, $so_dien_thoai, $mo_ta, $nam_sinh);
            header("location:index.php?url=list-teacher");
        }
    }
    public function deleteTeacher()
    {
        $id = $_GET['id'];
        $this->teacher->delete($id);
        header("location:index.php?url=list-teacher");
    }
}
