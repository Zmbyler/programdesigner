<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BlockFocusCategory;
use App\Category;
use App\BlockFocus;

class BlockFocusCategoryController extends Controller
{
    public function index($id)
    {
        $blockfocuscategory = BlockFocusCategory::with('category')->where('block_focus_id',$id)->get();
        return view('admin.blockfocuscategory.index',compact('blockfocuscategory'));
    }

    public function create($id)
    {
    	return view('admin.blockfocuscategory.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
            'blockfocus_id' =>'required',
            'category_id'   =>'required',
        ]);

    	$blockfocuscategory = new BlockFocusCategory;
        $blockfocuscategory->block_focus_id = $request->blockfocus_id;
        $blockfocuscategory->category_id = $request->category_id;
       	$blockfocuscategory->save();
        return \Redirect::route('blockfocuscategory.index',$blockfocuscategory->block_focus_id)->with('success','Block Focus Category Added Successfully.');
        //return redirect()->back()->with('success','Block Focus Category Added Successfully.');
    }

    public function edit($id)
    {
    	$blockfocuscategory = BlockFocusCategory::findOrFail($id);
        return view('admin.blockfocuscategory.edit',compact('blockfocuscategory'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'tempo'         =>'required',
            'rep'           =>'required',
            'kangaroo_vbt'  =>'required',
            'gorilla_vbt'   =>'required',
        ]);

    	$blockfocuscategory = BlockFocusCategory::findOrFail($id);
        $blockfocuscategory->tempo = $request->tempo;
        $blockfocuscategory->rep = $request->rep;
        $blockfocuscategory->kangaroo_vbt = $request->kangaroo_vbt;
        $blockfocuscategory->gorilla_vbt = $request->gorilla_vbt;
        $blockfocuscategory->save();
        //return \Redirect::back()->with('success','Block Focus Category Updated Successfully');
        return \Redirect::route('blockfocuscategory.index',$blockfocuscategory->block_focus_id)->with('success','Block Focus Category Updated Successfully.');
    }
}
