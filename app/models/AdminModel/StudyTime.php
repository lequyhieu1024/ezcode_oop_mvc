<?php

namespace App\Models\AdminModel;

use App\Models\BaseModel;

class StudyTime extends BaseModel
{
    public function add($thoi_gian)
    {
        $sql = "INSERT INTO lo_trinh_hoc (thoi_gian) value ('$thoi_gian')";
        $ressult = $this->dataProcess($sql);
        return $ressult;
    }
    public function detail($id)
    {
        $sql = "SELECT * FROM lo_trinh_hoc WHERE id_lo_trinh = $id";
        return $this->dataProcess($sql, false);
    }
    public function edit($id_lo_trinh, $thoi_gian)
    {
        $sql = "UPDATE lo_trinh_hoc SET thoi_gian='$thoi_gian' WHERE id_lo_trinh = '$id_lo_trinh'";
        $ressult = $this->dataProcess($sql);
        return $ressult;
    }
    public function all()
    {
        $sql = "SELECT * FROM lo_trinh_hoc";
        $ressult = $this->dataProcess($sql);
        return $ressult;
    }
    public function delete($id)
    {
        $sql = "DELETE FROM lo_trinh_hoc WHERE id_lo_trinh = $id";
        $this->dataProcess($sql);
    }
}
