<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProgramTemplate;
use App\TemplateType;
use App\ProgramGoal;
use App\Program;
use App\Days;
use App\UserProgramChart;
use App\Role;
use Auth;

class ProgramTemplateController extends Controller
{
    public function index(Request $request){
        // $keyword = '';
        // $status = '';
        // if($request->keyword){
        //     $keyword =$request->keyword;
        //     $programtemplate = ProgramTemplate::Where('name','LIKE', '%'.$keyword.'%')
        //     ->orderBy('created_at','desc')->get();
        // }elseif($request->status){
        //     $status = $request->status;
        //     $programtemplate = ProgramTemplate::where('status', ($status == 'Inactive') ? false : true)
        //     ->orderBy('created_at','desc')->get();
        // }else{
        $programtemplate = ProgramTemplate::with('templatetype','programgoal','day')->orderBy('id','desc')->get();
        //}
        return view('admin.programtemplate.index',compact('programtemplate'));
    }
    
    public function create()
    {
        $templates = TemplateType::pluck('name','id');
        $days = Days::pluck('name','id');
        return view('admin.programtemplate.create',compact('templates','days'));
    }

    public function ajaxSubprogram($id)
    {

        return ProgramGoal::where('template_type_id',$id)->pluck('name','id');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'template_type_id'=>'required',
            'name'=>'required|min:3'
        ]);
        $role = Role::where('slug','admin')->first();
        $input = $request->all();
        $programtemplate = ProgramTemplate::create([
            'user_id'           => Auth::user()->id,
            'template_type_id'  => $input['template_type_id'],
            'program_goal_id'   => $request->has('program_goal_id') ? $input['program_goal_id'] : 0,
            'day_id'            => $input['day_id'],
            'name'              => $input['name'],
            'added_by'          => $role->slug,
        ]);
        return redirect()->route('programtemplate.index')->with('success','Programtemplate has created successfully.');
    }

    public function edit($id)
    {
        $templates = TemplateType::pluck('name','id');
        $days = Days::pluck('name','id');
        $programtemplate = ProgramTemplate::findOrFail($id);
        return view('admin.programtemplate.edit',compact('programtemplate','templates','days'));
    }

    public function update(Request $request, $id)
    {
        $programtemplate = ProgramTemplate::findOrFail($id);
        $this->validate($request,[
            'template_type_id'  =>'required',
            'name'              =>'required|min:3',
        ]);
        if($programtemplate){
            $input = $request->all();
            $programtemplate->update($input);
            return redirect()->route('programtemplate.index')->with('success','Programtemplate updated successfully.');
        }else{
            return redirect()->route('programtemplate.index')->with('error','No Programtemplate found.');
        }
    }

    public function status($id){
        $programtemplate = ProgramTemplate::findOrFail($id);
        if($programtemplate){
            $status = ($programtemplate->status==1)?0:1;
            $programtemplate->update(['status'=>$status]);
            return redirect()->route('programtemplate.index')->with('success','Programtemplate updated successfully.');
        }else{
            return redirect()->route('programtemplate.index')->with('error','No programtemplate found.');
        }
       
    }
    public function destroy($id){
        $programtemplate = ProgramTemplate::findOrFail($id);
        
        if($programtemplate){
            Program::where('template_id',$id)->delete();
           $programtemplate->delete();
            return redirect()->route('programtemplate.index')->with('success','Program Template Deleted Successfully.');;

        }else{
            return redirect()->route('programtemplate.index')->with('error','No programtemplate found.');
        }
    }

    public function destroyBulkData(Request $request)
    {
        if (count($request->check_name) > 0) 
        {
            if (ProgramTemplate::whereIn('id', $request->check_name)->count() > 0)
            {
                Program::whereIn('template_id',$request->check_name)->delete();
                ProgramTemplate::whereIn('id', $request->check_name)->delete();
                $request->session()->flash('success', ' Program Template results deleted successfully.');
                return response()->json(true);
            } else {
                $request->session()->flash('error', 'Invalid request');
                return response()->json(false);
            }
        } else {
            $request->session()->flash('error', 'Invalid request');
            return response()->json(false);
        }
    }
}
