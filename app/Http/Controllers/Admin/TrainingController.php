<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Training;
use File;

class TrainingController extends Controller
{
    public function index(Request $request)
    {
        $keyword = '';
        if($request->keyword){
            $keyword =$request->keyword;
            $trainingpage = Training::where('title','LIKE', '%'.$keyword.'%')
            ->orWhere('short_description','LIKE', '%'.$keyword.'%')
            ->orWhere('long_description','LIKE', '%'.$keyword.'%')
            ->orderBy('created_at','desc')->get();
        }else{
           $trainingpage = Training::orderBy('title','ASC')->get();
        }
        return view('admin.training.index',compact('trainingpage','keyword'));
    }

    public function edit($id)
    {
        $training = Training::findOrFail($id);
        return view('admin.training.edit',compact('training'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'short_description' =>'required|string',
            'long_description'  =>'required|string',
            'title'             =>'required|string'
        ]);

        $training = Training::findOrFail($id);

        if($request->file('image') != null){
        $itainingoldImage = public_path("uploads/training_image/{$training->image}"); 
        if (File::exists($itainingoldImage)) { // unlink or remove previous image from folder
            unlink($itainingoldImage);
        }
        $files = $request->image;
        $destinationPath = public_path('/uploads/training_image/');
        $trainingImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $trainingImage);
        }else{
          $trainingImage = $training->image;
        }

        if($training){
            $input = $request->all();
            $training->update([
                'title'             =>$input['title'],
                'short_description' =>$input['short_description'],
                'long_description'  =>$input['long_description'],
                'image'             =>$trainingImage,
            ]);
            return redirect()->route('training.index')->with('success','Training updated successfully.');
        }else{
            return redirect()->route('training.index')->with('error','No Training found.');
        }
    }

    
}
