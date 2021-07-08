<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\UserDetails;
use App\Country;
use App\UserRole;

class UserController extends Controller
{
    public function index()
    {
        $userdata = User::with('userdetails.country')->whereHas('roles',function($q){
            $q->where('slug','!=','admin');
        })->orderby('created_at','desc')->get();

        return view('admin.user.index',compact('userdata'));
    }

    public function edit($id)
    {
        $countries = Country::orderBy('name','ASC')->pluck('name','id');
        $user = User::with('userdetails.country')->findorFail($id);
        return view('admin.user.edit',compact('user','countries'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findorFail($id);
        $this->validate($request,[
            'first_name'    =>'nullable|string',
            'last_name'     =>'nullable|string',
            'email'         =>'required|email|unique:users,email,'.$user->id,
            'business_name' =>'nullable|string',
            'country_id'    =>'required|integer',
            'city'          =>'required|string',
        ]);
        $user->update([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'business_name' => $request->business_name,
        ]);
        UserDetails::where('user_id',$id)->update([
            'country_id' => $request->country_id,
            'city' => $request->city,
        ]);
        return redirect()->route('users.index')->with('success','User updated successfully.');
    }

    public function status($id){
        $user = User::findOrFail($id);
        if($user){
            $status = ($user->status==1)?0:1;
            $user->update(['status'=>$status]);
            return redirect()->route('users.index')->with('success','User status updated successfully.');
        }else{
            return redirect()->route('users.index')->with('error','No user found.');
        }
       
    }

    public function destroy($id)
    {
        
        $user = User::findOrFail($id);
        if($user){
        UserRole::where('user_id',$id)->delete();
        UserDetails::where('user_id',$id)->delete();
        $user->delete();
        return redirect()->route('users.index')->with('success','User Deleted Successfully.');;
        }else{
            return redirect()->route('users.index')->with('error','No User found.');
        }
    }
}
