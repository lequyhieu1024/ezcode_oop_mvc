<?php

namespace App\Controllers\AdminController;

use App\Controllers\ClientController\BaseController;
use App\Models\AdminModel\Contact;

class AdminController extends BaseController
{
    public $contact;
    public function __construct()
    {
        $this->contact = new Contact();
    }
    public function index()
    {
        $this->render("admin.layout.masterLayout");
    }
    public function listContact()
    {
        $contacts = $this->contact->list();
        $this->render('admin.contact.list-contact', compact('contacts'));
    }
    public function repContact($id)
    {
        $contacts = $this->contact->info($id);
        $this->render('admin.contact.info-sender', compact('contacts'));
    }
    public function deleteContact($id)
    {
        $this->contact->delete($id);
        header('location: ' . ADMIN_URL . 'contacts/list-contact');
    }
}
