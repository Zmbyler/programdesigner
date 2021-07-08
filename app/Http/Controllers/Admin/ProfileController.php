<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class ProfileController extends Controller
{
    public function edit(){
    	$user = Auth::user();
        if($user){
            return view('admin.profile.edit',compact('user'));
        }else{
           return redirect()->route('admin.profile.edit')->with('error','No data found.'); 
        }
    	
    }

    public function update(Request $request){
    	$user = Auth::user();

    	$this->validate($request,[
            'first_name'=>'required|string',
            'last_name'=>'nullable|string',
            'email'=>'required|email|unique:users,email,'.$user->id,
        ]);

		$input = $request->all();
        $user->update($input);
        return redirect()->route('admin.profile.edit')->with('success','User updated successfully.');
    }
}
