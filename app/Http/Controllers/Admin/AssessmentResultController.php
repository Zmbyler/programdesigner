<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AssessmentResult;
use Auth;

class AssessmentResultController extends Controller
{
    public function index(Request $request){
        $keyword = '';
        $status = '';
        if($request->keyword){
            $keyword =$request->keyword;
            $assessmentResult = AssessmentResult::Where('name','LIKE', '%'.$keyword.'%')
            ->orderBy('created_at','desc')->get();
        }elseif($request->status){
            $status = $request->status;
            $assessmentResult = AssessmentResult::where('status', ($status == 'Inactive') ? false : true)
            ->orderBy('created_at','desc')->get();
        }else{
           $assessmentResult = AssessmentResult::latest()->get();
        }
        return view('admin.assessmentResult.index',compact('assessmentResult','keyword','status'));
    }

    public function create(){
        return view('admin.assessmentResult.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3|unique:program_templates,name',
            'assessment_option_one'=>'required',
            'assessment_option_two'=>'required',
        ]);

        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $assessmentResult = AssessmentResult::create($input);
        return redirect()->route('assessmentResult.index')->with('success','Assessment Result created successfully.');
    }

    public function edit($id){
        $assessmentResult = AssessmentResult::findOrFail($id);
        return view('admin.assessmentResult.edit',compact('assessmentResult'));
    }

    public function update(Request $request, $id){
        $assessmentResult = AssessmentResult::findOrFail($id);
        $this->validate($request,[
            'name'=>'required|min:3|unique:program_templates,name,'.$assessmentResult->id,
            'assessment_option_one'=>'required',
            'assessment_option_two'=>'required',
        ]);
        if($assessmentResult){
            $input = $request->all();
            $assessmentResult->update($input);
            return redirect()->route('assessmentResult.index')->with('success','Assessment Result updated successfully.');
        }else{
            return redirect()->route('assessmentResult.index')->with('error','No Assessment Result found.');
        }
    }

    public function status($id){
        $assessmentResult = AssessmentResult::findOrFail($id);
        if($assessmentResult){
            $status = ($assessmentResult->status==1)?0:1;
            $assessmentResult->update(['status'=>$status]);
            return redirect()->route('assessmentResult.index')->with('success','Assessment Result updated successfully.');
        }else{
            return redirect()->route('assessmentResult.index')->with('error','No Assessment Result found.');
        }

    }


    public function destroy($id){
        $assessmentResult = AssessmentResult::findOrFail($id);
        if($assessmentResult){
        $assessmentResult->delete();
        return redirect()->route('assessmentResult.index')->with('sucess',' Assessment deleted successfully.');
        }else{
            return redirect()->route('assessmentResult.index')->with('error','No Assessment Result found.');
        }
    }
}
