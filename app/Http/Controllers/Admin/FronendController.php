<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ContactusPage;
class FronendController extends Controller
{
    public function contactpage()
    {
    	$contactpage = ContactusPage::all();
    	return view('admin.managefrontend.contactusindex',compact('contactpage'));
    }

    public function edit($id)
    {
    	$contactpage = ContactusPage::where('id',$id)->first();
    	return view('admin.managefrontend.contactusedit',compact('contactpage'));
    }

    public function update(Request $request)
    {
    	$this->validate($request,[
            'short_description' =>'required|string',
            'long_description'  =>'required|string',
            'address'           =>'required|string',
            'email'             =>'required|string',
            'phone'             =>'required|string'
            
        ]);
        $input = $request->all();
        $contactpage = ContactusPage::where('id',$input['id'])->first();
        if($contactpage){
        	$contactpage->update($input);
        	return redirect()->route('contactpage')->with('success','Contact Page updated successfully.');
        }else{
        	return redirect()->route('contactpage')->with('error','No Contact Page found.');
        }
        
    	
    }
}
