<?php

namespace App\Models\AdminModel;

use App\Models\BaseModel;

class Account extends BaseModel
{
    public function dem_tai_khoan()
    {
        $sql = "SELECT COUNT(id_tai_khoan) as so_luong FROM tai_khoan";
        $rows = $this->dataProcess($sql);
        $so_luong = $rows['so_luong'];
        return $so_luong;
    }
    //public function addtaikhoan($ten_tai_khoan, $email, $nam_sinh, $avt, $so_dien_thoai, $id_role, $ho_va_ten, $mat_khau)
    // {
    //     $sql = "INSERT INTO tai_khoan(ten_tai_khoan,email,nam_sinh,avt,so_dien_thoai,id_role,ho_va_ten,mat_khau) VALUES ('$ten_tai_khoan','$email','$nam_sinh','$avt','$so_dien_thoai','$id_role','$ho_va_ten','$mat_khau')";
    //     return $this->dataProcess($sql);
    // }
    // public function edittaikhoan($id_tai_khoan, $ten_tai_khoan, $email, $nam_sinh, $avt, $so_dien_thoai, $id_role, $ho_va_ten, $mat_khau)
    // {
    //     if ($avt != "") {
    //         $sql = "UPDATE tai_khoan SET `id_tai_khoan`='$id_tai_khoan',`ten_tai_khoan`='$ten_tai_khoan',`ho_va_ten`='$ho_va_ten',`email`='$email',`nam_sinh`='$nam_sinh',`mat_khau`='$mat_khau',`avt`='$avt',`so_dien_thoai`='$so_dien_thoai',`id_role`='$id_role' WHERE id_tai_khoan ='$id_tai_khoan'";
    //     } else {
    //         $sql = "UPDATE tai_khoan SET `id_tai_khoan`='$id_tai_khoan',`ten_tai_khoan`='$ten_tai_khoan',`ho_va_ten`='$ho_va_ten',`email`='$email',`nam_sinh`='$nam_sinh',`mat_khau`='$mat_khau',`so_dien_thoai`='$so_dien_thoai',`id_role`='$id_role' WHERE id_tai_khoan ='$id_tai_khoan'";
    //     }
    //     return $this->dataProcess($sql);
    // }
    public function alltaikhoanqtv()
    {
        $sql = "SELECT * FROM tai_khoan WHERE id_role = 3 OR id_role=2";
        $result = $this->dataProcess($sql);
        return $result;
    }
    public function alltaikhoanhv()
    {
        $sql = "SELECT * FROM tai_khoan WHERE id_role =1";
        $result = $this->dataProcess($sql);
        return $result;
    }
    public function delete($id_tai_khoan)
    {
        $sql = "DELETE FROM tai_khoan WHERE id_tai_khoan = $id_tai_khoan";
        $this->dataProcess($sql);
    }
}
