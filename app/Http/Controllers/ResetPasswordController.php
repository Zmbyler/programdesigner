<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;

class ResetPasswordController extends Controller
{
    public function index(Request $request)
    {
    	$input = $request->all();
    	$token = $input['token'];
    	return view('user.reset',compact('token'));
    }

    public function reset(Request $request)
    {
    	$this->validate($request, [
           'token' => 'required',
           'email' => 'required|email',
           'password' => 'required|confirmed',
       	]);
    	$input = $request->all();
    	if($input['password']==$input['password_confirmation']){
    		$resetpass = DB::table("password_resets")->where('email', $input['email'])->first();
			if(!$resetpass){
				return back()->with('error','Invalid Token.');
			}else{
				$user = User::where('email',$input['email'])->first();
				if($user){
					$user->update([
	                	'password'=>bcrypt($input['password'])             
	                ]);
	                DB::table("password_resets")->where('email', $input['email'])->delete();
	                return redirect()->route('resetpassword.success')->with('success','Password changed successfully.');
		            
	    		}else{
	    			return back()->with('error','User not found.');
	    	    }
			}
    	}else{
    		return back()->with('error','New password and confirm new pasword should match.');
    	}
    }

    public function success()
    {
    	return view('user.success');
    }
}
