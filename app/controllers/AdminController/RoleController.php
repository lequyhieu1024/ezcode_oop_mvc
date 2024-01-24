<?php

namespace App\Controllers\AdminController;

use App\Models\AdminModel\Role;

class RoleController
{
    public $role;
    public function __construct()
    {
        $this->role = new Role();
    }
    public function allRole()
    {
        $role = $this->role->list();
        include('../../views/admin/role/allrole.php');
    }
    public function addRole()
    {
        include('../../views/admin/role/addrole.php');
        if (isset($_POST["addrole"])) {
            $name_role = $_POST['name_role'];
            $mo_ta = $_POST['mo_ta'];
            $this->role->add($name_role, $mo_ta);
            echo '<h2 style="color: red">Thêm thành công!</h2>';
        }
    }
    public function editRole()
    {
        $id = $_GET['id'];
        $role = $this->role->detail($id);
        include('../../views/admin/role/editrole.php');
        if (isset($_POST["editrole"])) {
            $id_role = $_POST['id_role'];
            $name_role = $_POST['name_role'];
            $mo_ta = $_POST['mo_ta'];
            $this->role->edit($id_role, $name_role, $mo_ta);
            header("location:index.php?url=list-role");
        }
    }
    public function deleteRole()
    {
        $id = $_GET['id'];
        $this->role->delete($id);
        header("location:index.php?url=list-role");
    }
}
