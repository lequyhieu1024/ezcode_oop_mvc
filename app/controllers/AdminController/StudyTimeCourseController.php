<?php

namespace App\Controllers\AdminController;

use App\Controllers\ClientController\BaseController;
use App\Models\AdminModel\Course;
use App\Models\AdminModel\StudyTime;
use App\Models\AdminModel\StudyTimeCourse;

class StudyTimeCourseController extends BaseController
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
        $this->render('admin.stdtimecourse.list-stdtime-course', compact('list'));
    }
    public function addStdTimeCourse()
    {
        $stdTime = $this->stdTime->all();
        $courese = $this->course->list();
        $this->render('admin.stdtimecourse.add-stdtime-course', compact('stdTime', 'courese'));
        if (isset($_POST['addltkh'])) {
            $id_lo_trinh = $_POST['id_lo_trinh'];
            $id_khoa_hoc = $_POST['id_khoa_hoc'];
            $this->stdTimeCourse->add($id_lo_trinh, $id_khoa_hoc);
            header("location:" . ADMIN_URL . "stdtimecourses/list-stdtime-course");
        }
    }
    public function editStdTimeCourse($id)
    {
        $list = $this->stdTimeCourse->detail($id);
        $stdTime = $this->stdTime->all();
        $course = $this->course->list();
        $this->render('admin.stdtimecourse.edit-stdtime-course', compact('list', 'stdTime', 'course'));
        if (isset($_POST['editltkh'])) {
            $id_ltkh = $_POST['id_lo_trinh_khoa_hoc'];
            $id_lo_trinh = $_POST['id_lo_trinh'];
            $id_khoa_hoc = $_POST['id_khoa_hoc'];
            $this->stdTimeCourse->edit($id_ltkh, $id_lo_trinh, $id_khoa_hoc);
            header("location:" . ADMIN_URL . "stdtimecourses/list-stdtime-course");
        }
    }
    public function deleteStdTimeCourse($id)
    {
        $this->stdTimeCourse->delete($id);
        header("location:" . ADMIN_URL . "stdtimecourses/list-stdtime-course");
    }
}
