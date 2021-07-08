<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TrainingAge;

class TrainingAgeController extends Controller
{
    public function index()
    {
    	$trainingAge = TrainingAge::orderby('id','asc')->get();
    	return view('admin.trainingage.index',compact('trainingAge'));
    }

    public function edit($id)
    {
    	$trainingAge = TrainingAge::findOrFail($id);
        return view('admin.trainingage.edit',compact('trainingAge'));
    }

    public function update(Request $request,$id)
    {
    	$this->validate($request,[
            'name'=>'required'
       	]);

    	$trainingage = TrainingAge::findOrFail($id);
    	$trainingage->name = $request->name;
    	$trainingage->save();
    	return redirect()->route('trainingage.index')->with('success','Training age updated successfully.');
    }
}
