<?php

namespace App\Models\ClientModel;

use App\Models\BaseModel;

class Categories extends BaseModel
{

    function alldanhmuc()
    {
        $sql = "SELECT * FROM danh_muc_khoa_hoc WHERE trang_thai ='show' ";
        $result = $this->dataProcess($sql);
        return $result;
    }
}
