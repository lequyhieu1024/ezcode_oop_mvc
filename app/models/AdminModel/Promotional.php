<?php

namespace App\Models\AdminModel;

use App\Models\BaseModel;

class Promotional extends BaseModel
{
    public function list()
    {
        $sql = "SELECT * FROM khuyen_mai";
        return $this->dataProcess($sql);
    }
    public function detail($id)
    {
        $sql = "SELECT * FROM khuyen_mai WHERE id_khuyen_mai = $id";
        return $this->dataProcess($sql, false);
    }
    public function add($ngay_bat_dau, $ngay_ket_thuc, $ten_khuyen_mai, $noi_dung, $avt)
    {
        $sql = "INSERT INTO khuyen_mai(ngay_ket_thuc,ten_khuyen_mai,ngay_bat_dau,noi_dung,avt) VALUES ('$ngay_ket_thuc','$ten_khuyen_mai','$ngay_bat_dau','$noi_dung','$avt')";
        $this->dataProcess($sql);
    }
    public function edit($id_khuyen_mai, $ngay_bat_dau, $ngay_ket_thuc, $ten_khuyen_mai, $noi_dung, $avt)
    {
        if ($avt != "") {
            $sql = "UPDATE khuyen_mai SET id_khuyen_mai='$id_khuyen_mai', ten_khuyen_mai='$ten_khuyen_mai', ngay_bat_dau='$ngay_bat_dau', ngay_ket_thuc='$ngay_ket_thuc', noi_dung='$noi_dung',avt='$avt' WHERE id_khuyen_mai ='$id_khuyen_mai'";
        } else {
            $sql = "UPDATE khuyen_mai SET id_khuyen_mai='$id_khuyen_mai', ten_khuyen_mai='$ten_khuyen_mai', ngay_bat_dau='$ngay_bat_dau', ngay_ket_thuc='$ngay_ket_thuc', noi_dung='$noi_dung' WHERE id_khuyen_mai ='$id_khuyen_mai'";
        }
        $this->dataProcess($sql);
    }
    public function delete($id_khuyen_mai)
    {
        $sql = "DELETE FROM khuyen_mai WHERE id_khuyen_mai = $id_khuyen_mai";
        $this->dataProcess($sql);
    }
}
