<?php

namespace App\Controllers\AdminController;

use App\Models\AdminModel\Contact;

class AdminController
{
    public $contact;
    public function __construct()
    {
        $this->contact = new Contact();
    }
    public function index()
    {
        echo 'xin chào';
    }
    public function listContact()
    {
        $contacts = $this->contact->list();
        include('../../views/admin/contact/alllienhe.php');
    }
    public function repContact()
    {
        $contacts = $this->contact->info();
        include('../../views/admin/contact/ttnguoiguilh.php');
    }
    public function deleteContact()
    {
        $id = $_GET['id'];
        $this->contact->delete($id);
        header('location: index.php?url=list-contact');
    }
}
