<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Cms;
use App\Exercise;

class DashboardController extends Controller
{
    public function index(){
    	$user = User::whereHas('roles',function($q){
    		$q->where('slug','!=','admin');
    	})->get();
    	$cmscount = Cms::count();
    	$exercisecount = Exercise::count();
    	return view('admin.dashboard.dashboard',compact('user','cmscount','exercisecount'));
    }
}
