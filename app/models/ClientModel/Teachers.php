<?php

namespace App\Models\ClientModel;

use App\Models\BaseModel;

class Teachers extends BaseModel
{
    function top_5_giang_vien()
    {
        $sql = "SELECT * FROM giang_vien order by id_giang_vien DESC LIMIT 5";
        $result = $this->dataProcess($sql);
        return $result;
    }
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
}
