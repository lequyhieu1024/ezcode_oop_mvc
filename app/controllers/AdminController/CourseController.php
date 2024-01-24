<?php

namespace App\Controllers\AdminController;

use App\Models\AdminModel\Category;
use App\Models\AdminModel\Course;
use App\Models\AdminModel\Teacher;

class CourseController
{
    protected $course;
    protected $teacher;
    protected $cat;
    public function __construct()
    {
        $this->course = new Course;
        $this->teacher = new Teacher();
        $this->cat = new Category();
    }
    public function listCourse()
    {
        $course = $this->course->list();
        include('../../views/admin/course/allkhoahoc.php');
    }
    public function addCourse()
    {
        $gv = $this->teacher->list();
        $cat = $this->cat->all();
        include('../../views/admin/course/addkhoahoc.php');
        if (isset($_POST["addkhoahoc"])) {
            $trang_thai = $_POST['trang_thai'];
            $mo_ta = $_POST['mo_ta'];
            $ten_khoa_hoc = $_POST['ten_khoa_hoc'];
            if ($_FILES['avt']['name'] != "") {
                $avt = basename($_FILES["avt"]["name"]);
                $target_dir = "../../../public/images/";
                $target_file = $target_dir . $avt;
                move_uploaded_file($_FILES["avt"]["tmp_name"], $target_file);
            } else {
                $avt = "";
            }
            $tien_hoc = $_POST['tien_hoc'];
            $id_giang_vien = $_POST['id_giang_vien'];
            $id_danh_muc = $_POST['id_danh_muc'];
            $slideshow = $_POST['slideshow'];
            $this->course->addkhoahoc($ten_khoa_hoc, $avt, $tien_hoc, $mo_ta, $trang_thai, $id_giang_vien, $id_danh_muc, $slideshow);
            header("location:index.php?url=list-course");
        }
    }
    public function editCourse()
    {
        $id = $_GET['id'];
        $editkh = $this->course->detail($id);
        $gv = $this->teacher->list();
        $cat = $this->cat->all();
        // echo '<pre>';
        // print_r($gv);
        // print_r($cat);
        // echo '</pre>';

        include('../../views/admin/course/editkhoahoc.php');
        if (isset($_POST["editkhoahoc"])) {
            $trang_thai = $_POST['trang_thai'];
            $id_khoa_hoc = $_POST['id_khoa_hoc'];
            $mo_ta = $_POST['mo_ta'];
            $ten_khoa_hoc = $_POST['ten_khoa_hoc'];
            if ($_FILES['avt']['name'] != "") {
                $avt = basename($_FILES["avt"]["name"]);
                $target_dir = "../../../public/images/";
                $target_file = $target_dir . $avt;
                move_uploaded_file($_FILES["avt"]["tmp_name"], $target_file);
            } else {
                $avt = "";
            }
            $tien_hoc = $_POST['tien_hoc'];
            $id_giang_vien = $_POST['id_giang_vien'];
            $id_danh_muc = $_POST['id_danh_muc'];
            $slideshow = $_POST['slideshow'];
            $this->course->editkhoahoc($id_khoa_hoc, $ten_khoa_hoc, $avt, $tien_hoc, $mo_ta, $trang_thai, $id_giang_vien, $id_danh_muc, $slideshow);
            header("location:index.php?url=list-course");
        }
    }
    public function deleteCourse()
    {
        $id = $_GET['id'];
        $this->course->delete($id);
        header("location:index.php?url=list-course");
    }
    public function courseByCat()
    {
        $id = $_GET['id'];
        $course = $this->course->kh_theo_dm($id);
        include('../../views/admin/course/khtheodm.php');
    }
}
