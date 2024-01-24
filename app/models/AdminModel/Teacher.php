<?php

namespace App\Models\AdminModel;

use App\Models\BaseModel;

class Teacher extends BaseModel
{
    public function list()
    {
        $sql = "SELECT * FROM giang_vien";
        return $this->dataProcess($sql);
    }
    public function detail($id)
    {
        $sql = "SELECT * FROM giang_vien WHERE id_giang_vien = $id";
        return $this->dataProcess($sql, false);
    }
    public function add($ma_giang_vien, $ten_giang_vien, $email, $avt, $so_dien_thoai, $mo_ta, $nam_sinh)
    {
        $sql = "INSERT INTO giang_vien(ma_giang_vien,ten_giang_vien,email,avt,so_dien_thoai,mo_ta,nam_sinh) VALUES ('$ma_giang_vien','$ten_giang_vien','$email','$avt','$so_dien_thoai','$mo_ta','$nam_sinh')";
        $this->dataProcess($sql);
    }
    public function edit($id_giang_vien, $ma_giang_vien, $ten_giang_vien, $email, $avt, $so_dien_thoai, $mo_ta, $nam_sinh)
    {
        if ($avt != "") {
            $sql = "UPDATE giang_vien  SET `id_giang_vien`='$id_giang_vien',`ten_giang_vien`='$ten_giang_vien',`ma_giang_vien`='$ma_giang_vien',`email`='$email',`avt`='$avt',`so_dien_thoai`='$so_dien_thoai',`mo_ta`='$mo_ta',`nam_sinh`='$nam_sinh' WHERE id_giang_vien = '$id_giang_vien'";
        } else {
            $sql = "UPDATE giang_vien  SET `id_giang_vien`='$id_giang_vien',`ten_giang_vien`='$ten_giang_vien',`ma_giang_vien`='$ma_giang_vien',`email`='$email',`so_dien_thoai`='$so_dien_thoai',`mo_ta`='$mo_ta',`nam_sinh`='$nam_sinh' WHERE id_giang_vien = '$id_giang_vien'";
        }
        $this->dataProcess($sql);
    }
    public function delete($id)
    {
        $sql = "DELETE FROM giang_vien WHERE id_giang_vien = $id";
        $this->dataProcess($sql);
    }
}
