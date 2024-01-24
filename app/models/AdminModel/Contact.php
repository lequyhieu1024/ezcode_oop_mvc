<?php

namespace App\Models\AdminModel;

use App\Models\BaseModel;

class Contact extends BaseModel
{
    public function list()
    {
        $sql = "SELECT * FROM lien_he JOIN tai_khoan ON lien_he.id_tai_khoan = tai_khoan.id_tai_khoan";
        $result = $this->dataProcess($sql);
        return $result;
    }
    public function info()
    {
        $id_lien_he = $_GET['id'];
        $sql = "SELECT * FROM lien_he JOIN tai_khoan ON lien_he.id_tai_khoan = tai_khoan.id_tai_khoan
        WHERE id_lien_he = '$id_lien_he'";
        $result = $this->dataProcess($sql);
        return $result;
    }
    public function delete($id_lien_he)
    {
        $sql = "DELETE FROM lien_he WHERE id_lien_he = $id_lien_he";
        $this->dataProcess($sql);
    }
}
