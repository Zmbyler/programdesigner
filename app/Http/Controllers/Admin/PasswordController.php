<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth,Hash;

class PasswordController extends Controller
{
    public function index(){

    	return view('admin.password.index');
    }

    public function store(Request $request){
    	$this->validate($request,[
    	  'old_password'=>'required|min:6',
    	  'new_password'=>'required|min:6',
    	  'confirm_new_password'=>'required|min:6',
    	]);

    	$input = $request->all();
    	
    	if($input['new_password']==$input['confirm_new_password']){
    		$user = User::where('id',Auth::user()->id)->first();
    		if($user){
    			if(!Hash::check($input['old_password'], $user->password)){
	                return back()->with('error','Incorrect old password.');
	            }else{
	                $user->update([
	                'password'=>bcrypt($input['new_password'])             
	                ]);
	              return back()->with('success','Password changed successfully.');
	            }
    		}else{
    			return back()->with('error','User not found.');
    	    }
    	}else{
    		return back()->with('error','New password and confirm new pasword should match.');
    	}
    }
}
