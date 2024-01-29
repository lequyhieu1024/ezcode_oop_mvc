<?php

namespace App\Controllers\AdminController;

use App\Controllers\ClientController\BaseController;
use App\Models\AdminModel\StudyTime;

class StudyTimeController extends BaseController
{
    protected $stdTime;
    public function __construct()
    {
        $this->stdTime = new StudyTime();
    }
    public function listStdTime()
    {
        $stdTime = $this->stdTime->all();
        $this->render('admin.stdtime.list-stdtime', compact('stdTime'));
    }
    public function addStdTime()
    {
        $this->render('admin.stdtime.add-stdtime');
        if (isset($_POST['addlotrinh'])) {
            $thoi_gian = $_POST['thoi_gian'];
            $this->stdTime->add($thoi_gian);
            header("location:" . ADMIN_URL . "stdtimes/list-stdtime");
        }
    }
    public function editStdTime($id)
    {
        $stdTime = $this->stdTime->detail($id);
        $this->render('admin.stdtime.edit-stdtime', compact('stdTime'));
        if (isset($_POST['editlotrinh'])) {
            $thoi_gian = $_POST['thoi_gian'];
            $id_lo_trinh = $_POST['id_lo_trinh'];
            $this->stdTime->edit($id_lo_trinh, $thoi_gian);
            header("location:" . ADMIN_URL . "stdtimes/list-stdtime");
        }
    }
    public function deleteStdTime($id)
    {
        $this->stdTime->delete($id);
        header("location:" . ADMIN_URL . "stdtimes/list-stdtime");
    }
}
