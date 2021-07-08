<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth, \Redirect, \Session, \Cache;

class LoginController extends Controller
{
    public function index(){
    	return view('admin.login.login');
    }

    public function loginAdmin(Request $request){

        $this->validate($request,[
	        'email'=>'required|email',
	        'password'=>'required'
      	]);

      	$user = User::where('email',$request->email)->first();
        if($user && $user->roles[0]['slug'] == 'admin'){
      		if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                return redirect::route('admin.dashboard.index');
            }else{
               return back()->with('error','Invalid password provided');
            }
      	}else{
          return back()->with('error','No user found. ');
        }
    }

    /*logout*/
    public function logout(){
      Session::flush();
      Auth::logout();
      Cache::flush();
      return Redirect::route('login.index');
    }
}
