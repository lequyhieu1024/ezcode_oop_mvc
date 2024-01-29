<?php

namespace App\Controllers\ClientController;

use App\Models\ClientModel\Accounts;
use App\Models\ClientModel\Categories;
use App\Models\ClientModel\Contact;
use App\Models\ClientModel\Courses;
use App\Models\ClientModel\Promotional;
use App\Models\ClientModel\StudyTimeCourses;
use App\Models\ClientModel\Teachers;

class HomeController extends BaseController
{
    protected $course;
    protected $categories;
    protected $teacher;
    protected $account;
    protected $promotional;
    protected $contact;
    protected $stdTimeCourse;
    public function __construct()
    {
        $this->course = new Courses();
        $this->categories = new Categories();
        $this->teacher = new Teachers();
        $this->account = new Accounts();
        $this->promotional = new Promotional();
        $this->contact = new Contact();
        $this->stdTimeCourse = new StudyTimeCourses();
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
        $this->render('client.layout.home', ['sl' => $sl, 'danhmuc' => $danhmuc, 'top5gv' => $top5gv, 'info' => $info, 'myskill' => $myskill, 'ctkh' => $ctkh, 'kh' => $kh, 'goodCourse' => $goodCourse, 'listTeacher' => $listTeacher]);
    }
    public function courseByCategory($id)
    {
        $courseByCategory = $this->course->kh_theo_dm($id);
        $sl = $this->course->dem_kh_cua_toi();
        $danhmuc = $this->categories->alldanhmuc();
        $top5gv = $this->teacher->top_5_giang_vien();
        $info = $this->account->myInfo();
        $myskill = $this->course->myskill();
        $ctkh = $this->course->khoahocnhieuluotxem();
        $kh = $this->course->khoahoc();
        $goodCourse = $this->course->khoahocdanhgiatot();
        $listTeacher = $this->teacher->list();
        $this->render('client.courses.all_kh_theo_dm', ['courseByCategory' => $courseByCategory, 'sl' => $sl, 'danhmuc' => $danhmuc, 'top5gv' => $top5gv, 'info' => $info, 'myskill' => $myskill, 'ctkh' => $ctkh, 'kh' => $kh, 'goodCourse' => $goodCourse, 'listTeacher' => $listTeacher]);
    }
    public function detailTeacher($id_giang_vien)
    {

        $detail = $this->teacher->detail($id_giang_vien);
        $sl = $this->course->dem_kh_cua_toi();
        $danhmuc = $this->categories->alldanhmuc();
        $top5gv = $this->teacher->top_5_giang_vien();
        $info = $this->account->myInfo();
        $myskill = $this->course->myskill();
        $this->render("client.teachers.detail-teacher", compact('sl', 'detail', 'danhmuc', 'top5gv', 'info', 'myskill'));
    }
    public function myCourses()
    {
        $sl = $this->course->dem_kh_cua_toi();
        $danhmuc = $this->categories->alldanhmuc();
        $top5gv = $this->teacher->top_5_giang_vien();
        $info = $this->account->myInfo();
        $myskill = $this->course->myskill();
        $id = isset($_SESSION['id_tai_khoan']) ? $_SESSION['id_tai_khoan'] : "";
        $myCources = $this->course->khoahoccuatoi($id);
        $this->render('client.courses.myCourses', compact('sl', 'danhmuc', 'top5gv', 'info', 'myskill', 'myCources'));
    }
    public function likedCourses()
    {
        $sl = $this->course->dem_kh_cua_toi();
        $danhmuc = $this->categories->alldanhmuc();
        $top5gv = $this->teacher->top_5_giang_vien();
        $info = $this->account->myInfo();
        $myskill = $this->course->myskill();
        $id = isset($_SESSION['id_tai_khoan']) ? $_SESSION['id_tai_khoan'] : "";
        $myCources = $this->course->khoahocyeuthichcuatoi($id);
        $this->render('client.courses.likedcourses', compact('sl', 'danhmuc', 'top5gv', 'info', 'myskill', 'myCources'));
    }
    public function listPromotional()
    {
        $sl = $this->course->dem_kh_cua_toi();
        $danhmuc = $this->categories->alldanhmuc();
        $top5gv = $this->teacher->top_5_giang_vien();
        $info = $this->account->myInfo();
        $myskill = $this->course->myskill();
        $km = $this->promotional->khuyen_mai();
        $this->render('client.promotional.list-promotional', compact('sl', 'danhmuc', 'top5gv', 'info', 'myskill', 'km'));
    }
    public function listContact()
    {
        $sl = $this->course->dem_kh_cua_toi();
        $danhmuc = $this->categories->alldanhmuc();
        $top5gv = $this->teacher->top_5_giang_vien();
        $info = $this->account->myInfo();
        $myskill = $this->course->myskill();
        if (isset($_SESSION['ten_tai_khoan'])) {
            $this->render('client.chucnangphu.list-contact', compact('sl', 'danhmuc', 'top5gv', 'info', 'myskill'));
        } else {
            echo '<script>alert("Hãy đăng nhập để gửi liên hệ")
                            window.location.href = "index.php"
                            </script>';
        }
    }
    public function sendContact()
    {
        $noi_dung = $_POST['noi_dung'];
        $id_tai_khoan = $_POST['id_tai_khoan'];
        $ngay_lien_he = $_POST['ngay_lien_he'];
        $trang_thai = $_POST['trang_thai'];
        $this->contact->lienhe($noi_dung, $ngay_lien_he, $id_tai_khoan, $trang_thai);
        echo '<script>alert("Liên hệ thành công, chờ phản hồi")</script>';
        echo '<script>window.location.href = "index.php"</script>';
    }
}
