<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Cms;

class CmsController extends Controller
{
    public function index(Request $request)
    {
        $keyword = '';
        if($request->keyword){
            $keyword =$request->keyword;
            $cmspage = Cms::where('title','LIKE', '%'.$keyword.'%')
            ->orWhere('description','LIKE', '%'.$keyword.'%')
            ->orderBy('created_at','desc')->get();
        }else{
           $cmspage = Cms::orderBy('id','desc')->get();
        }
        return view('admin.cms.index',compact('cmspage','keyword'));
     
    }

    
    public function edit($id)
    {
        $cms = Cms::findOrFail($id);
        return view('admin.cms.edit',compact('cms'));
    }

   
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'short_description'=>'required|string',
            'long_description'=>'required|string',
            'title'=>'required|string'
        ]);
        
        $cms = Cms::findOrFail($id);
        if($cms){
            $input = $request->all();
            $cms->update($input);
            return redirect()->route('cms.index')->with('success','Cms updated successfully.');
        }else{
            return redirect()->route('cms.index')->with('error','No cms found.');
        }
    }

}
