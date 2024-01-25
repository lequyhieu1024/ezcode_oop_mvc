<?php

namespace App\Controllers\ClientController;

use App\Models\AdminModel\Course;
use App\Models\ClientModel\Accounts;
use App\Models\ClientModel\Categories;
use App\Models\ClientModel\Courses;
use App\Models\ClientModel\Teachers;

class HomeController
{
    protected $course;
    protected $categories;
    protected $teacher;
    protected $account;
    public function __construct()
    {
        $this->course = new Courses();
        $this->categories = new Categories();
        $this->teacher = new Teachers();
        $this->account = new Accounts();
    }
    public function index()
    {
        $sl = $this->course->dem_kh_cua_toi();
        $danhmuc = $this->categories->alldanhmuc();
        $top5gv = $this->teacher->top_5_giang_vien();
        $info = $this->account->myInfo();
        $myskill = $this->course->myskill();
        $ctkh = $this->course->khoahocnhieuluotxem();
        $kh = $this->course->khoahoc();
        $goodCourse = $this->course->khoahocdanhgiatot();
        $listTeacher = $this->teacher->list();
        require_once 'App/views/client/layout/header.php';
        require_once 'App/views/client/layout/home.php';
        require_once 'App/views/client/layout/footer.php';
    }
    public function login()
    {
        include("app/views/client/taikhoan/login.php");
        if (isset($_POST["login"])) {
            $ten_tai_khoan = $_POST['ten_tai_khoan'];
            $mat_khau = $_POST['mat_khau'];
            $this->account->login($ten_tai_khoan, $mat_khau);
        }
    }
}
