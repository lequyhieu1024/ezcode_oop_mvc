<?php

namespace App\Controllers\AdminController;

use App\Controllers\ClientController\BaseController;
use App\Models\AdminModel\Account;

class AccountController extends BaseController
{
    protected $account;

    public function __construct()
    {
        $this->account = new Account();
    }
    public function listAccountAdmin()
    {
        $result = $this->account->alltaikhoanqtv();
        $this->render('admin.account.list-accounts-admin', compact('result'));
    }
    public function listAccountStudent()
    {
        $result = $this->account->alltaikhoanhv();
        $this->render('admin.account.list-accounts-student', compact('result'));
    }
    public function deleteAccountAdmin($id)
    {
        $this->account->delete($id);
        header("location:" . BASE_URL . "admin/accounts/list-accounts-admin");
    }
    public function deleteAccountStudent($id)
    {
        $this->account->delete($id);
        header("location:" . BASE_URL . "admin/accounts/list-accounts-student");
    }
}
