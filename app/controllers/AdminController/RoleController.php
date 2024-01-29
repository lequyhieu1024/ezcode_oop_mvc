<?php

namespace App\Controllers\AdminController;

use App\Controllers\ClientController\BaseController;
use App\Models\AdminModel\Role;

class RoleController extends BaseController
{
    public $role;
    public function __construct()
    {
        $this->role = new Role();
    }
    public function listRole()
    {
        $role = $this->role->list();
        $this->render('admin.role.list-role', compact('role'));
    }
    public function addRole()
    {
        $this->render('admin.role.add-role');
        if (isset($_POST["addrole"])) {
            $name_role = $_POST['name_role'];
            $mo_ta = $_POST['mo_ta'];
            $this->role->add($name_role, $mo_ta);
            header("location:" . ADMIN_URL . "roles/list-role");
        }
    }
    public function editRole($id)
    {
        $role = $this->role->detail($id);
        $this->render('admin.role.edit-role', compact('role'));
        if (isset($_POST["editrole"])) {
            $id_role = $_POST['id_role'];
            $name_role = $_POST['name_role'];
            $mo_ta = $_POST['mo_ta'];
            $this->role->edit($id_role, $name_role, $mo_ta);
            header("location:" . ADMIN_URL . "roles/list-role");
        }
    }
    public function deleteRole($id)
    {
        $this->role->delete($id);
        header("location:" . ADMIN_URL . "roles/list-role");
    }
}
