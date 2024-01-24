<?php

namespace App\Models\AdminModel;

use App\Models\BaseModel;

class StudyTimeCourse extends BaseModel
{
    public function add($id_lo_trinh, $id_khoa_hoc)
    {
        $sql = "INSERT INTO lo_trinh_khoa_hoc (id_lo_trinh,id_khoa_hoc) value ('$id_lo_trinh','$id_khoa_hoc')";
        $ressult = $this->dataProcess($sql);
        return $ressult;
    }
    public function edit($id_ltkh, $id_lo_trinh, $id_khoa_hoc)
    {
        $sql = "UPDATE lo_trinh_khoa_hoc SET id_lo_trinh_khoa_hoc = '$id_ltkh',id_lo_trinh=$id_lo_trinh,id_khoa_hoc='$id_khoa_hoc' WHERE id_lo_trinh_khoa_hoc = '$id_ltkh'";
        $ressult = $this->dataProcess($sql);
        return $ressult;
    }
    public function all()
    {
        $sql = "SELECT *,lo_trinh_khoa_hoc.id_lo_trinh_khoa_hoc as id_ltkh FROM lo_trinh_khoa_hoc
    JOIN lo_trinh_hoc ON lo_trinh_hoc.id_lo_trinh = lo_trinh_khoa_hoc.id_lo_trinh
    JOIN khoa_hoc ON khoa_hoc.id_khoa_hoc = lo_trinh_khoa_hoc.id_khoa_hoc
    ORDER BY khoa_hoc.id_khoa_hoc";
        $ressult = $this->dataProcess($sql);
        return $ressult;
    }
    public function detail($id)
    {
        $sql = "SELECT *,lo_trinh_khoa_hoc.id_lo_trinh_khoa_hoc as id_ltkh FROM lo_trinh_khoa_hoc
    JOIN lo_trinh_hoc ON lo_trinh_hoc.id_lo_trinh = lo_trinh_khoa_hoc.id_lo_trinh
    JOIN khoa_hoc ON khoa_hoc.id_khoa_hoc = lo_trinh_khoa_hoc.id_khoa_hoc
    Where id_lo_trinh_khoa_hoc = $id";
        $ressult = $this->dataProcess($sql, false);
        return $ressult;
    }
    public function delete($id)
    {
        $sql = "DELETE FROM lo_trinh_khoa_hoc WHERE id_lo_trinh_khoa_hoc = $id";
        $this->dataProcess($sql);
    }
}
