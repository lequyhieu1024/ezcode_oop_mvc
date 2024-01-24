<?php

namespace App\Models\AdminModel;

use App\Models\BaseModel;

class Status extends BaseModel
{
    function trang_thai()
    {
        $sql = "SELECT * FROM trang_thai";
        $result = $this->dataProcess($sql);
        return $result;
    }
}
