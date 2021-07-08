<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Exercise;
use App\Category;
use App\AssessmentCategory;
use App\TrainingAge;
use App\AthleteProfile;
use App\BlockFocus;

class ExerciseController extends Controller
{
    public function index(Request $request)
    {
        $exercises = Exercise::with('category','trainingage','athleteoption','blockfocus')->orderby('id', 'desc')->whereStatus(1)->get();
        return view('admin.exercise.index', compact('exercises'));
    }

    public function ajaxSubcat($id)
    {
        return Category::where('parent_id', $id)->with('childrenCategories')->whereStatus(1)->get();
    }

    public function create()
    {
        $assessmentCategory = AssessmentCategory::pluck('name', 'id');
        $trainingAge = TrainingAge::pluck('name', 'id');
        $athleteProfile = AthleteProfile::pluck('name', 'id');
        $blockFocus = BlockFocus::pluck('name', 'id');
        return view('admin.exercise.create', compact('assessmentCategory','trainingAge','athleteProfile','blockFocus'));
    }

    public function store(Request $request)
    {
        $rules = array(
            'name'        => 'required',
            'category_id' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        $ids = getParentIds(Category::where('id',$request->category_id)->with('recursiveparent')->first());
        $exerciseid = array_unique($ids);
        
        $input = $request->all();
        $exercise = Exercise::create($input);
        $exercise->category()->sync($exerciseid);
        return redirect()->route('exercise.index')->with('success', 'Exercise has created successfully.');
        
    }

    public function edit($id)
    {
        $exercise = Exercise::with('category','trainingage','athleteoption','blockfocus')->findOrFail($id);
        $assessmentCategory = AssessmentCategory::orderBy('name', 'ASC')->pluck('name', 'id');
        $trainingAge = TrainingAge::pluck('name', 'id');
        $athleteProfile = AthleteProfile::pluck('name', 'id');
        $blockFocus = BlockFocus::pluck('name', 'id');
        return view('admin.exercise.edit', compact('exercise', 'assessmentCategory','trainingAge','athleteProfile','blockFocus'));
    }

    public function update(Request $request, $id)
    {
        
        $rules = array(
            'name' => 'required',
            'category_id' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        $ids = getParentIds(Category::where('id',$request->category_id)->with('recursiveparent')->first());
        $id_array = array_unique($ids);

        $exercise = Exercise::findOrFail($id);
        if ($exercise) {
            $input = $request->all();
            $exercise->update($input);
            $exercise->category()->sync($id_array);
            return redirect()->route('exercise.index')->with('success', 'Exercise updated successfully.');
        } else {
            return redirect()->route('exercise.index')->with('error', 'No Exercise Result found.');
        }
        
    }

    public function status($id)
    {
        $exercise = Exercise::findOrFail($id);
        if ($exercise) {
            $status = ($exercise->status == 1) ? 0 : 1;
            $exercise->update(['status' => $status]);
            return redirect()->route('exercise.index')->with('success', 'Exercise updated successfully.');
        } else {
            return redirect()->route('exercise.index')->with('error', 'No Exercise Result found.');
        }
    }


    public function destroy($id)
    {
        $exercise = Exercise::findOrFail($id);
        if ($exercise){
            $exercise->delete();
            return redirect()->route('exercise.index')->with('success', ' Exercise deleted successfully.');
        } else {
            return redirect()->route('exercise.index')->with('error', 'No Exercise Result found.');
        }
    }

    public function destroyBulkData(Request $request)
    {
        if (count($request->check_name) > 0) 
        {
            if (Exercise::whereIn('id', $request->check_name)->count() > 0)
            {
                Exercise::whereIn('id', $request->check_name)->delete();
                
                $request->session()->flash('success', ' Exercise results deleted successfully.');
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
