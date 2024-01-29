<?php

namespace App\Controllers\ClientController;

use App\Models\ClientModel\Comments;
use App\Models\ClientModel\StudyTimeCourses;

class CoursesController extends HomeController
{
    public $comment;
    public $lt;
    public function __construct()
    {
        parent::__construct();
        $this->comment = new Comments();
        $this->lt = new StudyTimeCourses();
    }
    public function detailCourse($id_khoa_hoc, $id_danh_muc)
    {
        $id_tai_khoan = isset($_SESSION['id_tai_khoan']) ? $_SESSION['id_tai_khoan'] : "";
        $danhmuc = $this->categories->alldanhmuc();
        $top5gv = $this->teacher->top_5_giang_vien();
        $info = $this->account->myInfo();
        $sl = $this->course->dem_kh_cua_toi();
        $myskill = $this->course->myskill();
        $khct = $this->course->chitietkhoahoc($id_khoa_hoc);
        $this->course->updateview($id_khoa_hoc);
        $binhluan = $this->comment->binhluankhoahoc($id_khoa_hoc);
        $lt = $this->lt->lotrinh($id_khoa_hoc);
        $khyt = $this->course->checkYeuThich($id_tai_khoan, $id_khoa_hoc);
        $kh = $this->course->khoahoclienquan($id_danh_muc, $id_khoa_hoc);
        $slyt = $this->course->dem_luot_yeu_thich_khoa_hoc($id_khoa_hoc);
        $this->render('client.courses.detailCourse', compact(
            'danhmuc',
            'top5gv',
            'info',
            'sl',
            'myskill',
            'khct',
            'binhluan',
            'lt',
            'khyt',
            'kh',
            'slyt'
        ));
    }


    public function likeCourse()
    {
        $id_khoa_hoc = $_GET['id_khoa_hoc'];
        $id_danh_muc = $_GET['id_danh_muc'];
        $id_tai_khoan = $_SESSION['id_tai_khoan'];
        $this->course->yeu_thich_khoa_hoc($id_khoa_hoc, $id_tai_khoan);
        header("location:" . BASE_URL . "detail-course/$id_khoa_hoc/$id_danh_muc");
    }
    public function dislikeCourse()
    {
        $id_khoa_hoc = $_GET['id_khoa_hoc'];
        $id_danh_muc = $_GET['id_danh_muc'];
        $id_tai_khoan = $_SESSION['id_tai_khoan'];
        $this->course->huy_yeu_thich_khoa_hoc($id_khoa_hoc, $id_tai_khoan);
        header("location:" . BASE_URL . "detail-course/$id_khoa_hoc/$id_danh_muc");
    }
    public function comment($id_khoa_hoc, $id_danh_muc)
    {
        if (isset($_SESSION['ten_tai_khoan'])) {
            $id_tai_khoan = $_SESSION['id_tai_khoan'];
            $noi_dung_binh_luan = $_POST['noi_dung_binh_luan'];
            $ngay_binh_luan = $_POST['ngay_binh_luan'];
            $this->comment->addbinhluan($id_tai_khoan, $id_khoa_hoc, $noi_dung_binh_luan, $ngay_binh_luan);
            header("location: " . BASE_URL . "detail-course/$id_khoa_hoc/$id_danh_muc");
        } else {
            echo '<script>alert("Chưa đăng nhập")</script>';
            echo '<script>window.location.href=' . BASE_URL . 'detail-course/' . $id_khoa_hoc . '/' . $id_danh_muc . '</script>';
        }
    }
    public function searchCourse()
    {
        $sl = $this->course->dem_kh_cua_toi();
        $danhmuc = $this->categories->alldanhmuc();
        $top5gv = $this->teacher->top_5_giang_vien();
        $info = $this->account->myInfo();
        $myskill = $this->course->myskill();
        $listTeacher = $this->teacher->list();
        $resultSearch = $this->course->search();
        $this->render('client.courses.courses-by-search', compact(
            'danhmuc',
            'top5gv',
            'info',
            'sl',
            'myskill',
            'listTeacher',
            'resultSearch'
        ));
    }
    public function detailMyCourse($id_khoa_hoc, $id_dang_ky_khoa_hoc)
    {
        $detail = $this->course->chitietkhcuatoi($id_khoa_hoc, $id_dang_ky_khoa_hoc);
        $sl = $this->course->dem_kh_cua_toi();
        $danhmuc = $this->categories->alldanhmuc();
        $top5gv = $this->teacher->top_5_giang_vien();
        $info = $this->account->myInfo();
        $myskill = $this->course->myskill();
        $listTeacher = $this->teacher->list();
        $checkdg = $this->comment->checkdanhgia($id_khoa_hoc);
        $this->render('client.courses.detail-my-course', compact(
            'danhmuc',
            'top5gv',
            'info',
            'sl',
            'myskill',
            'listTeacher',
            'detail',
            'checkdg'
        ));
    }
    public function addRate($id_khoa_hoc, $id_dang_ky_khoa_hoc)
    {

        if (isset($_POST['adddanhgia'])) {
            if (isset($_SESSION['id_tai_khoan'])) {
                $id_tai_khoan = $_SESSION['id_tai_khoan'];
                $danh_gia = $_POST['danh_gia'];
                if ($danh_gia >= 1 && $danh_gia <= 5) {
                    $this->comment->adddanhgia($id_tai_khoan, $id_khoa_hoc, $danh_gia);
                    echo '<script>alert("Đánh giá thành công")</script>';
                    echo '<script>window.location.href="' . BASE_URL . 'detail-my-course/' . $id_khoa_hoc . '/' . $id_dang_ky_khoa_hoc . '"</script>';
                } else {
                    echo '<script>alert("Không thể đánh giá 0 sao")</script>';
                    echo '<script>window.location.href="' . BASE_URL . 'detail-my-course/' . $id_khoa_hoc . '/' . $id_dang_ky_khoa_hoc . '"</script>';
                }
            }
        }
    }
    public function unregisterCourseCtl($id_dang_ky_khoa_hoc)
    {
        $this->course->unregisterCourse($id_dang_ky_khoa_hoc);
        header('location:' . BASE_URL . 'my-courses');
    }
}
