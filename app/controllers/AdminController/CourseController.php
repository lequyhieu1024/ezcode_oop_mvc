<?php

namespace App\Controllers\AdminController;

use App\Controllers\ClientController\BaseController;
use App\Models\AdminModel\Category;
use App\Models\AdminModel\Course;
use App\Models\AdminModel\Status;
use App\Models\AdminModel\Teacher;

class CourseController extends BaseController
{
    protected $course;
    protected $teacher;
    protected $cat;
    protected $status;
    public function __construct()
    {
        $this->course = new Course;
        $this->teacher = new Teacher();
        $this->cat = new Category();
        $this->status = new Status;
    }
    public function listCourse()
    {
        $course = $this->course->list();
        $this->render('admin.course.list-courses', compact('course'));
    }
    public function addCourse()
    {
        $gv = $this->teacher->list();
        $cat = $this->cat->all();
        $this->render('admin.course.add-course', compact('gv', 'cat'));
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
            header("location:" . BASE_URL . "admin/courses/list-course");
        }
    }
    public function editCourse($id)
    {
        $editkh = $this->course->detail($id);
        $gv = $this->teacher->list();
        $cat = $this->cat->all();
        // echo '<pre>';
        // print_r($gv);
        // print_r($cat);
        // echo '</pre>';

        $this->render('admin.course.edit-course', compact('editkh', 'gv', 'cat'));
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
            header("location:" . BASE_URL . "admin/courses/list-course");
        }
    }
    public function deleteCourse($id)
    {
        $this->course->delete($id);
        header("location:" . BASE_URL . "admin/courses/list-course");
    }
    public function courseByCat($id)
    {
        $course = $this->course->kh_theo_dm($id);
        $this->render('admin.course.course-by-cat', compact('course'));
    }
    public function registedCourse()
    {
        $course = $this->course->QLkhdadangky();
        $this->render('admin.course.list-registed-course', compact('course'));
    }
    public function updateStatus($id)
    {
        $status = $this->status->trang_thai();
        $currentStatus = $this->course->chitietkhcuatoi($id);
        $this->render('admin.course.update-status-registed-course', compact('status', 'currentStatus'));
        if (isset($_POST['edit_trangthai'])) {
            $trang_thai = $_POST['trang_thai'];
            $this->course->editQLkhdadangky($id, $trang_thai);
            header("location:" . ADMIN_URL . "registedcourse/list-course");
        }
    }
}
