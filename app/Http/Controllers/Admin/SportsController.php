<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sport;

class SportsController extends Controller
{
	public function index(){
		$sports = Sport::orderby('id','asc')->get();
    	return view('admin.sports.index',compact('sports'));
	}
    
}
