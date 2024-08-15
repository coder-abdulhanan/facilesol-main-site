<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\frontend\ContactModel;

class AdminContactController extends Controller
{
    public function index(){

        $FullName = session('first_name') . " " . session('last_name');
        $Contacts = ContactModel::all();
        return view('backend.contact-active', ['contact' => $Contacts, 'FullName' => $FullName]);
    }

}
