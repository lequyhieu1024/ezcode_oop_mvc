<?php

namespace App\Models\AdminModel;

use App\Models\BaseModel;

class Comment extends BaseModel
{
    function listComment()
    {
        $sql = "SELECT * FROM binh_luan 
            LEFT JOIN tai_khoan ON binh_luan.id_tai_khoan = tai_khoan.id_tai_khoan
            LEFT JOIN khoa_hoc ON binh_luan.id_khoa_hoc = khoa_hoc.id_khoa_hoc";
        $result = $this->dataProcess($sql);
        return $result;
    }
    function listRate()
    {
        $sql = "SELECT id_danh_gia,danh_gia,tai_khoan.ten_tai_khoan, khoa_hoc.ten_khoa_hoc FROM danh_gia 
            JOIN tai_khoan ON danh_gia.id_tai_khoan = tai_khoan.id_tai_khoan
            JOIN khoa_hoc ON danh_gia.id_khoa_hoc = khoa_hoc.id_khoa_hoc";
        $result = $this->dataProcess($sql);
        return $result;
    }
    public function delete($id)
    {
        $sql = "DELETE FROM binh_luan WHERE id_binh_luan = $id";
        return $this->dataProcess($sql);
    }
}
