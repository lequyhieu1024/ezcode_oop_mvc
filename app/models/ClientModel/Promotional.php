<?php

namespace App\Models\ClientModel;

use App\Models\BaseModel;

class Promotional extends BaseModel
{
    function khuyen_mai()
    {
        $now = date("Y-m-d H:i:s");
        $sql = "SELECT * FROM khuyen_mai WHERE ngay_ket_thuc > '$now'";
        $result = $this->dataProcess($sql);
        return $result;
    }
}
