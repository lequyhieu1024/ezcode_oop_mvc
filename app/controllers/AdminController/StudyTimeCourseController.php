<?php

namespace App\Controllers\AdminController;

use App\Models\AdminModel\Course;
use App\Models\AdminModel\StudyTime;
use App\Models\AdminModel\StudyTimeCourse;

class StudyTimeCourseController
{
    public $stdTimeCourse;
    public $stdTime;
    public $course;
    public function __construct()
    {
        $this->stdTimeCourse = new StudyTimeCourse();
        $this->stdTime = new StudyTime();
        $this->course = new Course();
    }
    public function listStdTimeCourse()
    {
        $list = $this->stdTimeCourse->all();
        include('../../views/admin/stdTimeCourse/allltkh.php');
    }
    public function addStdTimeCourse()
    {
        $stdTime = $this->stdTime->all();
        $courese = $this->course->list();
        include('../../views/admin/stdTimeCourse/addltkh.php');
        if (isset($_POST['addltkh'])) {
            $id_lo_trinh = $_POST['id_lo_trinh'];
            $id_khoa_hoc = $_POST['id_khoa_hoc'];
            $this->stdTimeCourse->add($id_lo_trinh, $id_khoa_hoc);
            echo '<h2 style="color: red">Thêm thành công!</h2>';
        }
    }
    public function editStdTimeCourse()
    {
        $id = $_GET['id'];
        $list = $this->stdTimeCourse->detail($id);
        $stdTime = $this->stdTime->all();
        $course = $this->course->list();
        include('../../views/admin/stdTimeCourse/editltkh.php');
        if (isset($_POST['editltkh'])) {
            $id_ltkh = $_POST['id_lo_trinh_khoa_hoc'];
            $id_lo_trinh = $_POST['id_lo_trinh'];
            $id_khoa_hoc = $_POST['id_khoa_hoc'];
            $this->stdTimeCourse->edit($id_ltkh, $id_lo_trinh, $id_khoa_hoc);
            header("location:index.php?url=list-study-time-course");
        }
    }
    public function deleteStdTimeCourse()
    {
        $id = $_GET['id'];
        $this->stdTimeCourse->delete($id);
        header("location:index.php?url=list-study-time-course");
    }
}
