<?php

namespace App\Models\ClientModel;

use App\Models\BaseModel;

class Contact extends BaseModel
{
  public function lienhe($noi_dung, $ngay_lien_he, $id_tai_khoan, $trang_thai)
  {
    $sql = "INSERT INTO lien_he(noi_dung,ngay_lien_he,id_tai_khoan,trang_thai) VALUES('$noi_dung', '$ngay_lien_he','$id_tai_khoan','$trang_thai')";
    $this->dataProcess($sql);
  }
  public function mycontact($id_tai_khoan)
  {
    $sql = "SELECT * FROM lien_he WHERE id_tai_khoan = '$id_tai_khoan'";
    $result = $this->dataProcess($sql);
    return $result;
  }
}
