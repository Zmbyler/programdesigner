<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\TemplateType;
use App\ProgramGoal;
use App\Season;
use App\Sport;
use App\ProgramTemplate;
use App\Category;
use App\Program;
use Auth;

class ProgramController extends Controller
{
    public function index(Request $request)
    {
        $templatetype='';
        $programgoal='';
        if($request->has('program_id')){
            $programgoal = ProgramGoal::where('id',$request->program_id)->first();
            $programs = Program::where('program_goal_id',$request->program_id)->with('template','category','subcategory')->orderby('id','asc')->get();
        }elseif($request->has('template_id')){
            $templatetype = TemplateType::where('id',$request->template_id)->first();
            $programs = Program::where('main_template_id',$request->template_id)->with('template','category','subcategory','season','sport')->orderby('id','asc')->get();
        }else{
            return abort(404);
        }


        return view('admin.program.index',compact('programs','programgoal','templatetype'));
    }


    public function create(){

        $templates = TemplateType::pluck('name','id');
        $categories = Category::where('parent_id',0)->whereStatus(1)->with('exercise')->get();
        return view('admin.program.create',compact('templates','categories'));
    }

    public function ajaxChildgoal($id){
        return ProgramGoal::where('template_type_id',$id)->pluck('name','id');
    }

    public function ajaxChildgoaltemplate($id){
        return ProgramTemplate::where('program_goal_id',$id)->pluck('name','id');
    }

    public function ajaxChildtemplate($id){
        return ProgramTemplate::where('template_type_id',$id)->pluck('name','id');
    }

    public function ajaxSubcat($id)
    {
        return Category::where('parent_id', $id)->whereStatus(1)->pluck('name', 'id');
    }

    public function store(Request $request)
    {
        return $request->all();
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        
        //$categories = Category::with('subcategory')->where('parent_id',0)->orderBy('id','desc')->get();
        $categories = Category::where('parent_id', 0)->where('status',1)->pluck('name', 'id');
        $program = Program::where('id',$id)->with('category')->first();
        $sports = Sport::pluck('name','id');
        $seasons = Season::pluck('name','id');
        $programtemplate = ProgramTemplate::where('template_type_id',$program->main_template_id)->where('program_goal_id',$program->program_goal_id)->where('user_id',Auth::user()->id)->pluck('name','id');
        return view('admin.program.edit',compact('program','categories','programtemplate','seasons','sports'));
    }

    public function programUpdate(Request $request)
    {
        if($request->ajax()){
            if($request->name == 'category_id'){
                Program::find($request->pk)->update([$request->name => $request->value,'subcategory_id'=>null]);
                echo "1";
            }else{
                Program::find($request->pk)->update([$request->name => $request->value]);
                echo "1";
            }
            
        }
    }

    public function getParentCategory()
    {
        return Category::where('parent_id',0)->whereStatus(1)->pluck('name','id');
    }
    
    public function getParentsubCategory($id)
    {
        return Category::where('parent_id',$id)->whereStatus(1)->with('childrenCategories')->pluck('name','id');
    }


    public function update(Request $request, $id)
    {
        $rules = array(
            'day' => 'sometimes|numeric|digits_between:1,3',
        );
        $validator = Validator::make($request->all(), $rules);
        $program = Program::findorFail($request->id);
        $data = [
            'sport_id'  => $request->has('sport_id') ? $request->sport_id : 0,
            'season_id' => $request->has('season_id') ? $request->season_id : 0,
            'day'       => $request->day,
            'sequence'  => $request->sequence,
            'tempo'     => $request->tempo,
            'rest'      => $request->rest,
            'week1'     => $request->week1,
            'week2'     => $request->week2,
            'week3'     => $request->week3,
            'week4'     => $request->week4,
            'series'    => $request->series,
            'frequency' => $request->frequency,
            'time'      => $request->time,
            'sets_reps' => $request->sets_reps,
            'comment'   => $request->comment,
        ];
        $program->update($data);
        //$program->category()->sync($request->category_id);
        if($program->program_goal_id != 0){
            $program = [
                'program_id' =>$program->program_goal_id
            ];
             
        }else{
            $program = [
                'template_id' =>$program->main_template_id
            ];
        }
        return \Redirect::route('program.index',$program)->with('success', 'Program Updated Successfully!');
    }


    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        if($program){
        $program->delete();
            return redirect()->back()->with('sucess',' Program deleted successfully.');
        }else{
            return redirect()->back()->with('error','No Program Result found.');
        }
    }

    public function destroyBulkData(Request $request)
    {
        if (count($request->check_name) > 0) 
        {
            if (Program::whereIn('id', $request->check_name)->count() > 0)
            {
                Program::whereIn('id',$request->check_name)->delete();
                
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
