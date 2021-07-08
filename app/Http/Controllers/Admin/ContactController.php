<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function index()
    {
    	$contacts = Contact::orderby('id','desc')->get();
    	return view('admin.contact.index',compact('contacts'));
    }
}
