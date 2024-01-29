<?php

namespace App\Controllers\ClientController;

use App\Models\AdminModel\Course;
use App\Models\ClientModel\Accounts;
use App\Models\ClientModel\Categories;
use App\Models\ClientModel\Courses;
use App\Models\ClientModel\Teachers;

class AccountController
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
    public function login()
    {
        include("app/views/client/accounts/login.php");
        if (isset($_POST["login"])) {
            $ten_tai_khoan = $_POST['ten_tai_khoan'];
            $mat_khau = $_POST['mat_khau'];
            $account = $this->account->login($ten_tai_khoan, $mat_khau);
            // print_r($account);
            if ($account['ten_tai_khoan'] === $ten_tai_khoan && $account['mat_khau'] === $mat_khau) {
                $_SESSION['ten_tai_khoan'] = $account['ten_tai_khoan'];
                $_SESSION['id_role'] = $account['id_role'];
                $_SESSION['id_tai_khoan'] = $account['id_tai_khoan'];
                header('location:index.php');
            } else {
                echo '<script>alert("Sai thông tin đăng nhập")</script>';
                echo '<script>window.location.href= "app/views/client/taikhoan/login.php"</script>';
            }
        }
    }
    public function register()
    {
        include("app/views/client/accounts/register.php");
        if (isset($_POST['register'])) {
            $success = $err = "";
            $ten_tai_khoan = $_POST['ten_tai_khoan'];
            $email = $_POST['email'];
            $mat_khau = $_POST['mat_khau'];
            $id_role = $_POST['id_role'];
            $xn_mat_khau = $_POST['xn_mat_khau'];
            $checkRegister = $this->account->checkRegister($ten_tai_khoan, $email);
            if ($mat_khau === $xn_mat_khau && empty($checkRegister)) {
                $this->account->register($ten_tai_khoan, $email, $mat_khau, $id_role);
                echo '<script>
                    var xacNhan = confirm("Đăng ký thành công. Mời đăng nhập");
                        if(xacNhan){
                            window.location.href ="app/views/client/taikhoan/login.php"}
                    </script>';
            } else {
                echo '<script>alert("Đăng ký tên người dùng,email đã tồn tại hoặc mật khẩu không khớp")</script>';
                echo '<script> window.location.href ="app/views/client/taikhoan/register.php"</script>';
            }
        }
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        echo '
        <script>
        alert("đã đăng xuất");
        window.location.href= "index.php";
        </script>';
    }
}
