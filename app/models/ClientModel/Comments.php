<?php

namespace App\Models\ClientModel;

use App\Models\BaseModel;

class Comments extends BaseModel
{
    public function binhluankhoahoc($id_khoa_hoc)
    {
        $sql = "SELECT binh_luan.*,tai_khoan.avt as avt_tk,tai_khoan.ten_tai_khoan  FROM binh_luan
    JOIN khoa_hoc ON binh_luan.id_khoa_hoc = khoa_hoc.id_khoa_hoc
    JOIN tai_khoan ON binh_luan.id_tai_khoan = tai_khoan.id_tai_khoan
    WHERE binh_luan.id_khoa_hoc = '$id_khoa_hoc'";
        $result = $this->dataProcess($sql);
        return $result;
    }
    public function addbinhluan($id_tai_khoan, $id_khoa_hoc, $noi_dung_binh_luan, $ngay_binh_luan)
    {
        $sql = "INSERT INTO binh_luan( id_tai_khoan, id_khoa_hoc, noi_dung_binh_luan, ngay_binh_luan) VALUES ('$id_tai_khoan','$id_khoa_hoc','$noi_dung_binh_luan','$ngay_binh_luan')";
        $this->dataProcess($sql);
    }
    public function adddanhgia($id_tai_khoan, $id_khoa_hoc, $danh_gia)
    {
        $sql = "INSERT INTO danh_gia(id_tai_khoan, id_khoa_hoc,danh_gia) VALUES ('$id_tai_khoan','$id_khoa_hoc','$danh_gia')";
        $this->dataProcess($sql);
    }
    public function checkdanhgia($id_khoa_hoc)
    {
        $id_tai_khoan = $_SESSION['id_tai_khoan'];
        $sql = "SELECT * FROM danh_gia WHERE id_khoa_hoc = '$id_khoa_hoc' AND id_tai_khoan='$id_tai_khoan'";
        $result = $this->dataProcess($sql);
        return $result;
    }
}
