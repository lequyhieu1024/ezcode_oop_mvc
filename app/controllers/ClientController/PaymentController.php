<?php

namespace App\Controllers\ClientController;

class PaymentController extends HomeController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function paymentInfomation($id_khoa_hoc)
    {
        $lt = $this->course->lo_trinh_khoa_hoc($id_khoa_hoc);
        $km = $this->promotional->khuyen_mai();
        $ttkh = $this->course->chitietkhoahoc($id_khoa_hoc);
        $sl = $this->course->dem_kh_cua_toi();
        $danhmuc = $this->categories->alldanhmuc();
        $top5gv = $this->teacher->top_5_giang_vien();
        $info = $this->account->myInfo();
        // $info = $this->account->myInfo1($id_tai_khoan);

        $myskill = $this->course->myskill();
        $this->render('client.thanhtoan.payment', compact(
            'danhmuc',
            'top5gv',
            'info',
            'sl',
            'myskill',
            'lt',
            'ttkh'
        ));
    }
    public function pay()
    {
        if (isset($_SESSION['id_tai_khoan'])) {
            $id_tai_khoan = $_POST['id_tai_khoan'];
            $ho_va_ten = $_POST['ho_va_ten'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $email = $_POST['email'];
            $id_khoa_hoc = $_POST['id_khoa_hoc'];
            $id_giang_vien = $_POST['id_giang_vien'];
            $thanh_tien = $_POST['thanh_tien'];
            $ngay_dang_ky_hoc = $_POST['ngay_dang_ky_hoc'];
            $trang_thai = $_POST['trang_thai'];
            $id_khuyen_mai = $_POST['khuyen_mai'];
            $lo_trinh = $_POST['lo_trinh_hoc'];
            $pttt = $_POST['pttt'];
            $this->course->dangkykhoahoc($id_tai_khoan, $id_khoa_hoc, $id_giang_vien, $thanh_tien, $ngay_dang_ky_hoc, $lo_trinh, $trang_thai, $id_khuyen_mai, $ho_va_ten, $so_dien_thoai, $email, $pttt);
            echo '<script>alert("Đã đăng ký, chờ xác nhận")</script>';
            echo '<script>window.location.href="index.php?redirect=khoahoccuatoi"</script>';
        } else {
            $id_khoa_hoc = $_POST['id_khoa_hoc'];
            echo '<script>alert("Vui lòng đăng nhập để đăng ký khóa học")</script>';
            echo '<script>window.location.href="index.php?redirect=chitietkhoahoc&id_khoa_hoc=' . $id_khoa_hoc . '"</script>';
        }
    }
}
