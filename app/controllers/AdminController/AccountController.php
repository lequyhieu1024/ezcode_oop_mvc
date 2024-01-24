<?php

namespace App\Controllers\AdminController;

use App\Models\AdminModel\Account;

class AccountController
{
    protected $account;

    public function __construct()
    {
        $this->account = new Account();
    }
    public function listAccountAdmin()
    {
        $result = $this->account->alltaikhoanqtv();
        require_once 'account/alltaikhoanqtv.php';
    }
    public function listAccountStudent()
    {
        $result = $this->account->alltaikhoanhv();
        require_once 'account/alltaikhoanhv.php';
    }
    public function deleteAccountAdmin()
    {
        $id_tai_khoan = $_GET['id'];
        $this->account->delete($id_tai_khoan);
        header('location: index.php?url=list-account-admin');
    }
    public function deleteAccountStudent()
    {
        $id_tai_khoan = $_GET['id'];
        $this->account->delete($id_tai_khoan);
        header('location: index.php?url=list-account-student');
    }
}
