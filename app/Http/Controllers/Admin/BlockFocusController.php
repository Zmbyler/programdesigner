<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BlockFocus;
use App\BlockfocusTempo;
use App\Exercise;

class BlockFocusController extends Controller
{
    public function index()
    {
    	$blockfocus = BlockFocus::orderby('id','asc')->get();
    	return view('admin.blockfocus.index',compact('blockfocus'));
    }

    public function edit($id)
    {
        $blockfocus = BlockFocus::findOrFail($id);
        return view('admin.blockfocus.edit',compact('blockfocus'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);

        $blockfocus = BlockFocus::findOrFail($id);
        $blockfocus->name = $request->name;
        $blockfocus->save();
        return redirect()->route('blockfocus.index')->with('success','Blockfocus updated successfully.');
    }

    public function tempolist($id)
    {
    	$blocktempo = BlockfocusTempo::where('block_foci_id',$id)->with('exercise')->get();
    	return view('admin.blockfocus.tempolist',compact('blocktempo'));
    }

    public function tempocreate()
    {
    	$exercise = Exercise::pluck('name','id');
        $blockfocus = BlockFocus::pluck('name','id');
    	return view('admin.blockfocus.tempoadd',compact('exercise','blockfocus'));
    }

    public function tempostore(Request $request)
    {
        $this->validate($request,[
            'exercise_id'=>'required',
            'block_foci_id'=>'required',
            'tempo'=>'required'
        ]);
        $input = $request->all();
        $blockfocus = BlockfocusTempo::create($input);
        return \Redirect::route('blockfocus.tempolist',['id'=>$input['block_foci_id']])->with('success', 'Tempo Added Successfully.');
    }

    public function tempoedit($id)
    {
        $tempoedit = BlockfocusTempo::where('id',$id)->first();
        return view('admin.blockfocus.tempoedit',compact('tempoedit'));
    }

    public function tempoupdate(Request $request)
    {
    	$this->validate($request,[
            'tempo'=>'required'
        ]);
    	$input = $request->all();
    	$tempoedit = BlockfocusTempo::where('id',$input['id'])->update([
    		'tempo' => $input['tempo']
    	]);

    	return \Redirect::route('blockfocus.tempolist',['id'=>$input['block_focus_id']])->with('success','Tempo Updated Successfully.');
		//with(['id'=>$input['block_focus_id'],'succes' => 'Alread Apply for this post']);

    }
}
