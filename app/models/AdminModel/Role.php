<?php

namespace App\Models\AdminModel;

use App\Models\BaseModel;

class Role extends BaseModel
{
    function list()
    {
        $sql = "SELECT * FROM role";
        $result = $this->dataProcess($sql);
        return $result;
    }
    function add($name_role, $mo_ta)
    {
        $sql = "INSERT INTO role(name_role,mo_ta) VALUES ('$name_role','$mo_ta')";
        $this->dataProcess($sql);
    }
    public function detail($id_role)
    {
        $sql = "SELECT * FROM role WHERE id_role = $id_role";
        $result = $this->dataProcess($sql, false);
        return $result;
    }
    function edit($id_role, $name_role, $mo_ta)
    {
        $sql = "UPDATE `role` SET id_role='$id_role', name_role='$name_role',mo_ta='$mo_ta' WHERE id_role = '$id_role'";
        $this->dataProcess($sql);
    }
    function delete($id_role)
    {
        $sql = "DELETE FROM role WHERE id_role = $id_role ";
        $this->dataProcess($sql);
    }
}
