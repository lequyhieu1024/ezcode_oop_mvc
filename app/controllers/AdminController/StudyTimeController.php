<?php

namespace App\Controllers\AdminController;

use App\Models\AdminModel\StudyTime;

class StudyTimeController
{
    protected $stdTime;
    public function __construct()
    {
        $this->stdTime = new StudyTime();
    }
    public function listStdTime()
    {
        $stdTime = $this->stdTime->all();
        include('../../views/admin/stdTime/alllotrinh.php');
    }
    public function addStdTime()
    {
        include('../../views/admin/stdTime/addlotrinh.php');
        if (isset($_POST['addlotrinh'])) {
            $thoi_gian = $_POST['thoi_gian'];
            $this->stdTime->add($thoi_gian);
            echo '<h2 style="color: red">Thêm thành công!</h2>';
        }
    }
    public function editStdTime()
    {
        $id = $_GET['id'];
        $stdTime = $this->stdTime->detail($id);
        include('../../views/admin/stdTime/editlotrinh.php');
        if (isset($_POST['editlotrinh'])) {
            $thoi_gian = $_POST['thoi_gian'];
            $id_lo_trinh = $_POST['id_lo_trinh'];
            $id_khoa_hoc = $_POST['id_khoa_hoc'];
            $this->stdTime->edit($id_lo_trinh, $thoi_gian);
            header("location:index.php?url=list-study-time");
        }
    }
    public function deleteStdTime()
    {
        $id = $_GET['id'];
        $this->stdTime->delete($id);
        header("location:index.php?url=list-study-time");
    }
}
