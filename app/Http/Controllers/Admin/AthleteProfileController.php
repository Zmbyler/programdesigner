<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AthleteProfile;

class AthleteProfileController extends Controller
{
    public function index()
    {
    	$athleteProfile = AthleteProfile::orderby('id','asc')->get();
    	return view('admin.athleteProfile.index',compact('athleteProfile'));
    }

    public function edit($id)
    {
        $athleteProfile = AthleteProfile::findOrFail($id);
        return view('admin.athleteProfile.edit',compact('athleteProfile'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);

        $athleteProfile = AthleteProfile::findOrFail($id);
        $athleteProfile->name = $request->name;
        $athleteProfile->save();
        return redirect()->route('athlete.index')->with('success','Athlete Profile updated successfully.');
    }
}
