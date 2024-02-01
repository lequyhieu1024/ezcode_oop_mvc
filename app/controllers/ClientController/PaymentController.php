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
        if (isset($_SESSION['id_tai_khoan'])) {

            $stdtime = $this->course->lo_trinh_khoa_hoc($id_khoa_hoc);
            $promotional = $this->promotional->khuyen_mai();
            $course = $this->course->chitietkhoahoc($id_khoa_hoc);
            $sl = $this->course->dem_kh_cua_toi();
            $danhmuc = $this->categories->alldanhmuc();
            $top5gv = $this->teacher->top_5_giang_vien();
            $info = $this->account->myInfo();
            $info1 = $this->account->myInfo1();
            // $info = $this->account->myInfo1($id_tai_khoan);
            $myskill = $this->course->myskill();
            $this->render('client.payment.payment', compact(
                'promotional',
                'danhmuc',
                'top5gv',
                'info',
                'info1',
                'sl',
                'myskill',
                'stdtime',
                'course'
            ));
        } else {
            echo '<script>alert("bạn chưa đăng nhập")</script>';
            echo '<script>window.location.href = "' . BASE_URL . 'login"</script>';
        }
    }
    public function pay($id_khoa_hoc)
    {
        $pttt = $_POST['pttt'];


        if ($pttt == 1) {
            $id_tai_khoan = $_SESSION['id_tai_khoan'];
            $ho_va_ten = $_POST['ho_va_ten'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $email = $_POST['email'];
            $thanh_tien = $_POST['thanh_tien'];
            $ngay_dang_ky_hoc = $_POST['ngay_dang_ky'];
            $trang_thai = 1;
            $id_khuyen_mai = $_POST['id_khuyen_mai'];
            $lo_trinh = $_POST['lo_trinh_hoc'];
            $pttt = $_POST['pttt'];
            header('location: ' . BASE_URL . 'app/views/client/payment/vnpay/vnpay_create_payment.php?thanh_tien=' . $thanh_tien);
        } elseif ($pttt == 3) {
            $id_tai_khoan = $_SESSION['id_tai_khoan'];
            $ho_va_ten = $_POST['ho_va_ten'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $email = $_POST['email'];
            $thanh_tien = $_POST['thanh_tien'];
            $ngay_dang_ky_hoc = $_POST['ngay_dang_ky'];
            $trang_thai = 1;
            $id_khuyen_mai = $_POST['id_khuyen_mai'];
            $lo_trinh = $_POST['lo_trinh_hoc'];
            $pttt = $_POST['pttt'];
            header('location: ' . BASE_URL . 'app/views/client/payment/momopayment/atm_momo.php?thanh_tien=' . $thanh_tien);
        } else {
            $id_tai_khoan = $_SESSION['id_tai_khoan'];
            $ho_va_ten = $_POST['ho_va_ten'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $email = $_POST['email'];
            $thanh_tien = $_POST['thanh_tien'];
            $ngay_dang_ky_hoc = $_POST['ngay_dang_ky'];
            $trang_thai = 1;
            $id_khuyen_mai = $_POST['id_khuyen_mai'];
            $lo_trinh = $_POST['lo_trinh_hoc'];
            $pttt = $_POST['pttt'];
            $this->course->dangkykhoahoc($id_tai_khoan, $id_khoa_hoc, $thanh_tien, $ngay_dang_ky_hoc, $lo_trinh, $trang_thai, $id_khuyen_mai, $ho_va_ten, $so_dien_thoai, $email, $pttt);
            echo '<script>alert("Đã đăng ký, chờ xác nhận")</script>';
            echo '<script>window.location.href="' . BASE_URL . 'my-courses"</script>';
        }
    }
}
