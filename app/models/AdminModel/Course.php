<?php

namespace App\Models\AdminModel;

use App\Models\BaseModel;

class Course extends BaseModel
{
    public function list()
    {
        $sql = "SELECT *,khoa_hoc.id_khoa_hoc,khoa_hoc.mo_ta, khoa_hoc.trang_thai,giang_vien.ma_giang_vien,khoa_hoc.avt, avg(danh_gia.danh_gia) as avg_rate
    FROM khoa_hoc
    JOIN danh_muc_khoa_hoc ON khoa_hoc.id_danh_muc = danh_muc_khoa_hoc.id_danh_muc
    LEFT JOIN binh_luan ON binh_luan.id_khoa_hoc = khoa_hoc.id_khoa_hoc
    LEFT JOIN danh_gia ON danh_gia.id_khoa_hoc = khoa_hoc.id_khoa_hoc
    JOIN giang_vien ON giang_vien.id_giang_vien = khoa_hoc.id_giang_vien GROUP BY khoa_hoc.id_khoa_hoc";
        $result = $this->dataProcess($sql);
        return $result;
    }
    public function delete($id)
    {
        $sql = "DELETE FROM khoa_hoc WHERE id_khoa_hoc = $id";
        $this->dataProcess($sql);
    }
    public function detail($id)
    {
        $sql = "SELECT khoa_hoc.*,giang_vien.id_giang_vien,khoa_hoc.id_khoa_hoc,khoa_hoc.mo_ta,
    khoa_hoc.trang_thai,giang_vien.ma_giang_vien,khoa_hoc.avt,danh_muc_khoa_hoc.id_danh_muc,
    avg(danh_gia.danh_gia) as avg_rate
    FROM khoa_hoc
    JOIN danh_muc_khoa_hoc ON khoa_hoc.id_danh_muc = danh_muc_khoa_hoc.id_danh_muc
    LEFT JOIN binh_luan ON binh_luan.id_khoa_hoc = khoa_hoc.id_khoa_hoc
    LEFT JOIN danh_gia ON danh_gia.id_khoa_hoc = khoa_hoc.id_khoa_hoc
    JOIN giang_vien ON giang_vien.id_giang_vien = khoa_hoc.id_giang_vien 
    WHERE khoa_hoc.id_khoa_hoc = $id;
    ";
        $result = $this->dataProcess($sql, false);
        return $result;
    }
    public function kh_theo_dm($id_danh_muc)
    {

        $sql = "SELECT *,khoa_hoc.id_khoa_hoc,khoa_hoc.mo_ta, khoa_hoc.trang_thai,giang_vien.ma_giang_vien,khoa_hoc.avt, avg(danh_gia.danh_gia) as avg_rate
        FROM khoa_hoc
        JOIN danh_muc_khoa_hoc ON khoa_hoc.id_danh_muc = danh_muc_khoa_hoc.id_danh_muc
        LEFT JOIN binh_luan ON binh_luan.id_khoa_hoc = khoa_hoc.id_khoa_hoc
        LEFT JOIN danh_gia ON danh_gia.id_khoa_hoc = khoa_hoc.id_khoa_hoc
        JOIN giang_vien ON giang_vien.id_giang_vien = khoa_hoc.id_giang_vien 
        WHERE danh_muc_khoa_hoc.id_danh_muc = '$id_danh_muc'
        GROUP BY khoa_hoc.id_khoa_hoc, khoa_hoc.mo_ta, khoa_hoc.trang_thai, giang_vien.ma_giang_vien, khoa_hoc.avt";
        $result = $this->dataProcess($sql);
        return $result;
    }
    public function dem_khoa_hoc()
    {
        $sql = "SELECT COUNT(id_khoa_hoc) as so_luong FROM khoa_hoc";
        $rows = $this->dataProcess($sql, false);
        $so_luong = $rows['so_luong'];
        return $so_luong;
    }
    public function tinhTongThu()
    {
        $sql = "SELECT SUM(thanh_tien) as tongtien FROM dang_ky_khoa_hoc WHERE trang_thai = 3";
        $rows = $this->dataProcess($sql, false);
        $tongtien = $rows['tongtien'];
        return $tongtien;
    }
    public function addkhoahoc($ten_khoa_hoc, $avt, $tien_hoc, $mo_ta, $trang_thai, $id_giang_vien, $id_danh_muc, $slideshow)
    {
        $sql = "INSERT INTO khoa_hoc(ten_khoa_hoc, avt, tien_hoc, mo_ta ,trang_thai, id_giang_vien, id_danh_muc, slideshow) VALUES ('$ten_khoa_hoc','$avt','$tien_hoc','$mo_ta','$trang_thai','$id_giang_vien','$id_danh_muc','$slideshow')";
        $this->dataProcess($sql);
    }
    public function editkhoahoc($id_khoa_hoc, $ten_khoa_hoc, $avt, $tien_hoc, $mo_ta, $trang_thai, $id_giang_vien, $id_danh_muc, $slideshow)
    {
        if ($avt != "") {
            $sql = "UPDATE khoa_hoc SET ten_khoa_hoc='$ten_khoa_hoc', id_khoa_hoc='$id_khoa_hoc', avt='$avt', tien_hoc='$tien_hoc', mo_ta='$mo_ta', trang_thai='$trang_thai', id_giang_vien='$id_giang_vien', id_danh_muc='$id_danh_muc', slideshow='$slideshow' WHERE id_khoa_hoc ='$id_khoa_hoc'";
        } else {
            $sql = "UPDATE khoa_hoc SET ten_khoa_hoc='$ten_khoa_hoc', id_khoa_hoc='$id_khoa_hoc', tien_hoc='$tien_hoc', mo_ta='$mo_ta', trang_thai='$trang_thai', id_giang_vien='$id_giang_vien', id_danh_muc='$id_danh_muc', slideshow='$slideshow' WHERE id_khoa_hoc ='$id_khoa_hoc'";
        }
        $this->dataProcess($sql);
    }
    public function editQLkhdadangky($id_dang_ky_khoa_hoc, $trang_thai)
    {
        $sql = "UPDATE dang_ky_khoa_hoc set trang_thai = '$trang_thai' WHERE id_dang_ky_khoa_hoc = '$id_dang_ky_khoa_hoc'";
        $this->dataProcess($sql);
    }
    public function chitietkhcuatoi($id_dang_ky_khoa_hoc)
    {
        $sql = "SELECT dang_ky_khoa_hoc.id_dang_ky_khoa_hoc,dang_ky_khoa_hoc.trang_thai,khoa_hoc.id_khoa_hoc, khoa_hoc.avt as avt_kh,trang_thai.ten_trang_thai,trang_thai.id_trang_thai, khoa_hoc.ten_khoa_hoc,giang_vien.ma_giang_vien,
    khoa_hoc.tien_hoc
    FROM dang_ky_khoa_hoc
    JOIN khoa_hoc ON khoa_hoc.id_khoa_hoc = dang_ky_khoa_hoc.id_khoa_hoc
    JOIN tai_khoan ON tai_khoan.id_tai_khoan = dang_ky_khoa_hoc.id_tai_khoan
    JOIN giang_vien ON giang_vien.id_giang_vien = khoa_hoc.id_giang_vien
    JOIN trang_thai ON trang_thai.id_trang_thai = dang_ky_khoa_hoc.trang_thai
    LEFT JOIN khuyen_mai ON khuyen_mai.id_khuyen_mai = dang_ky_khoa_hoc.id_khuyen_mai
    WHERE dang_ky_khoa_hoc.id_dang_ky_khoa_hoc = $id_dang_ky_khoa_hoc";
        $results = $this->dataProcess($sql);
        return $results;
    }
    public function QLkhdadangky()
    {
        $sql = "SELECT *,dang_ky_khoa_hoc.lo_trinh as lt,dang_ky_khoa_hoc.email as email_tk,dang_ky_khoa_hoc.so_dien_thoai as sdt_tk,dang_ky_khoa_hoc.ho_va_ten as ho_va_ten_tk,trang_thai.id_trang_thai as id_trang_thai_kh,dang_ky_khoa_hoc.id_khoa_hoc,khoa_hoc.ten_khoa_hoc,khoa_hoc.avt as avt_kh, trang_thai.ten_trang_thai,giang_vien.ma_giang_vien ,khuyen_mai.ten_khuyen_mai
    FROM dang_ky_khoa_hoc
    JOIN tai_khoan ON tai_khoan.id_tai_khoan = dang_ky_khoa_hoc.id_tai_khoan
    JOIN trang_thai ON trang_thai.id_trang_thai = dang_ky_khoa_hoc.trang_thai
    JOIN khoa_hoc ON khoa_hoc.id_khoa_hoc = dang_ky_khoa_hoc.id_khoa_hoc
    LEFT JOIN khuyen_mai ON khuyen_mai.id_khuyen_mai = dang_ky_khoa_hoc.id_khuyen_mai
    JOIN giang_vien ON giang_vien.id_giang_vien = khoa_hoc.id_giang_vien";
        $result = $this->dataProcess($sql);
        return $result;
    }
    public function QLkhdadangkyTop3()
    {
        $sql = "SELECT *,dang_ky_khoa_hoc.lo_trinh as lt,dang_ky_khoa_hoc.email as email_tk,dang_ky_khoa_hoc.so_dien_thoai as sdt_tk,dang_ky_khoa_hoc.ho_va_ten as ho_va_ten_tk,trang_thai.id_trang_thai as id_trang_thai_kh,dang_ky_khoa_hoc.id_khoa_hoc,khoa_hoc.ten_khoa_hoc,khoa_hoc.avt as avt_kh, trang_thai.ten_trang_thai,giang_vien.ma_giang_vien ,khuyen_mai.ten_khuyen_mai
    FROM dang_ky_khoa_hoc
    JOIN tai_khoan ON tai_khoan.id_tai_khoan = dang_ky_khoa_hoc.id_tai_khoan
    JOIN trang_thai ON trang_thai.id_trang_thai = dang_ky_khoa_hoc.trang_thai
    JOIN khoa_hoc ON khoa_hoc.id_khoa_hoc = dang_ky_khoa_hoc.id_khoa_hoc
    LEFT JOIN khuyen_mai ON khuyen_mai.id_khuyen_mai = dang_ky_khoa_hoc.id_khuyen_mai
    JOIN giang_vien ON giang_vien.id_giang_vien = khoa_hoc.id_giang_vien
    WHERE dang_ky_khoa_hoc.trang_thai = 1 ";
        $result = $this->dataProcess($sql);
        return $result;
    }
    public function trang_thai_cxn()
    {
        $sql = "SELECT *,dang_ky_khoa_hoc.lo_trinh as lt,dang_ky_khoa_hoc.email as email_tk,dang_ky_khoa_hoc.so_dien_thoai as sdt_tk,
    dang_ky_khoa_hoc.ho_va_ten as ho_va_ten_tk,trang_thai.id_trang_thai as id_trang_thai_kh,
    khoa_hoc.avt as avt_kh FROM dang_ky_khoa_hoc
    JOIN tai_khoan ON tai_khoan.id_tai_khoan = dang_ky_khoa_hoc.id_tai_khoan
    JOIN khoa_hoc ON khoa_hoc.id_khoa_hoc = dang_ky_khoa_hoc.id_khoa_hoc
    JOIN giang_vien ON giang_vien.id_giang_vien = khoa_hoc.id_giang_vien
    JOIN trang_thai ON trang_thai.id_trang_thai = dang_ky_khoa_hoc.trang_thai
    LEFT JOIN khuyen_mai ON khuyen_mai.id_khuyen_mai = dang_ky_khoa_hoc.id_khuyen_mai
    WHERE dang_ky_khoa_hoc.trang_thai = 1";
        $result = $this->dataProcess($sql);
        return $result;
    }
    public function trang_thai_dcxl()
    {
        $sql = "SELECT *,dang_ky_khoa_hoc.lo_trinh as lt,dang_ky_khoa_hoc.email as email_tk,
    dang_ky_khoa_hoc.so_dien_thoai as sdt_tk,dang_ky_khoa_hoc.ho_va_ten as ho_va_ten_tk,
    trang_thai.id_trang_thai as id_trang_thai_kh,khoa_hoc.avt as avt_kh FROM dang_ky_khoa_hoc
    JOIN tai_khoan ON tai_khoan.id_tai_khoan = dang_ky_khoa_hoc.id_tai_khoan
    JOIN khoa_hoc ON khoa_hoc.id_khoa_hoc = dang_ky_khoa_hoc.id_khoa_hoc
    JOIN giang_vien ON giang_vien.id_giang_vien = khoa_hoc.id_giang_vien
    JOIN trang_thai ON trang_thai.id_trang_thai = dang_ky_khoa_hoc.trang_thai
    LEFT JOIN khuyen_mai ON khuyen_mai.id_khuyen_mai = dang_ky_khoa_hoc.id_khuyen_mai
    WHERE dang_ky_khoa_hoc.trang_thai = 2";
        $result = $this->dataProcess($sql);
        return $result;
    }
    public function trang_thai_dktc()
    {
        $sql = "SELECT *,dang_ky_khoa_hoc.lo_trinh as lt,dang_ky_khoa_hoc.email as email_tk,dang_ky_khoa_hoc.so_dien_thoai as sdt_tk,dang_ky_khoa_hoc.ho_va_ten as ho_va_ten_tk,
    trang_thai.id_trang_thai as id_trang_thai_kh,khoa_hoc.avt as avt_kh FROM dang_ky_khoa_hoc
    JOIN tai_khoan ON tai_khoan.id_tai_khoan = dang_ky_khoa_hoc.id_tai_khoan
    JOIN khoa_hoc ON khoa_hoc.id_khoa_hoc = dang_ky_khoa_hoc.id_khoa_hoc
    JOIN giang_vien ON giang_vien.id_giang_vien = khoa_hoc.id_giang_vien
    JOIN trang_thai ON trang_thai.id_trang_thai = dang_ky_khoa_hoc.trang_thai
    LEFT JOIN khuyen_mai ON khuyen_mai.id_khuyen_mai = dang_ky_khoa_hoc.id_khuyen_mai
    WHERE dang_ky_khoa_hoc.trang_thai = 3";
        $result = $this->dataProcess($sql);
        return $result;
    }


    public function thong_ke()
    {
        $sql = "SELECT danh_muc_khoa_hoc.id_danh_muc, danh_muc_khoa_hoc.ten_danh_muc, COUNT(khoa_hoc.id_khoa_hoc) as so_luong_kh,
    SUM(khoa_hoc.tien_hoc) as thanh_tien_sum FROM danh_muc_khoa_hoc LEFT JOIN khoa_hoc 
    ON danh_muc_khoa_hoc.id_danh_muc = khoa_hoc.id_danh_muc GROUP BY danh_muc_khoa_hoc.id_danh_muc";
        $result = $this->dataProcess($sql);
        return $result;
    }
}
