<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ProgramImport;
use App\Imports\ExerciseDataImport;
use App\Imports\ProgramDataImport;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Rules\RequiredValidation;
use App\Rules\CategoryMatch;
use Illuminate\Support\Arr;
use App\Rules\DbMatch;
use App\AssessmentCategory;
use App\ProgramTemplate;
use App\AthleteProfile;
use App\ProgramGoal;
use App\TemplateType;
use App\TrainingAge;
use App\BlockFocus;
use App\Category;
use App\Exercise;
use App\Program;
use App\Sport;
use App\Season;
use Validator;

class ExportImportController extends Controller
{
    public function createProgramTemplate()
    {
        $templates  = TemplateType::pluck('name', 'id');
        $sports     = Sport::pluck('name', 'id');
        $seasons    = Season::pluck('name', 'id');
        $categories = Category::where('parent_id', 0)->where('status',1)->pluck('name', 'id');
        return view('admin.exportImport.program_template', compact('templates','sports','seasons', 'categories'));
    }

    public function ajaxChildgoal($id)
    {
        return ProgramGoal::where('template_type_id', $id)->pluck('name', 'id');
    }

    public function ajaxChildgoaltemplate($id, $child_id = null)
    {
        if($child_id) {
            return ProgramTemplate::where(['template_type_id' => $id, 'program_goal_id' => $child_id,'status' => 1])->pluck('name', 'id');
        } else {
            return ProgramTemplate::where(['template_type_id' => $id,'status' => 1])->pluck('name', 'id');
        }
    }

    public function ajaxSubCategory($id)
    {
        return Category::where('parent_id', $id)->pluck('name', 'id');
    }

    public function ajaxSubSubCategory($id)
    {
        return Category::with('childrenCategories')->where('parent_id',$id)->orderBy('id','desc')->get();
    }

    // sample excel download
    public function sampleExcelProgramTemplate()
    {
        if (file_exists(public_path('assets/sample_program_template.xlsx'))){
            $file = public_path() . "/assets/sample_program_template.xlsx";
            $headers = array('Content-Type: application/vnd.ms-excel');
            return response()->download($file, 'sample_program_template.xlsx', $headers);
        }
        return redirect()->back()->withError('File not found.');
    }

    public function sampleExcelExercise()
    {
        if (file_exists(public_path('assets/sample_exercise.xlsx'))){
            $file = public_path() . "/assets/sample_exercise.xlsx";
            $headers = array('Content-Type: application/vnd.ms-excel');
            return response()->download($file, 'sample_exercise.xlsx', $headers);
        }
        return redirect()->back()->withError('File not found.');
    }

    

    // import function
    public function importProgramTemplate(Request $request)
    {
        $data = Excel::toCollection(new ProgramDataImport(), $request->file('document'));
        
        foreach($data[0] as $key=>$d){
            if($d->filter()->isNotEmpty()){
                
                $templateType    = TemplateType::where('name',trim($d[0]))->first();
                $programGoal     = ProgramGoal::where('name',trim($d[1]))->first();
                $programTemplate = ProgramTemplate::where('name',trim($d[2]))->where('template_type_id',@$templateType->id)->first();
                $category        = Category::where('name',trim($d[3]))->first();
                $subcategory     = Category::where('name',trim($d[4]))->first();

                $validator = Validator::make($d->toArray(),[
                    $d[0] = ['required', new DbMatch(['name'=>trim($d[0]),'rowno'=>($key+2),'attr'=>'Main Template','model'=>'\App\TemplateType'])],
                    $d[1] = ['nullable', new DbMatch(['name'=>trim($d[1]),'rowno'=>($key+2),'attr'=>'ProgramGoal','model'=>'\App\ProgramGoal'])],
                    $d[2] = ['required', new DbMatch(['name'=>@$programTemplate->name,'rowno'=>($key+2),'attr'=>'Template Type','model'=>'\App\ProgramTemplate'])],
                    $d[3] = ['required', new DbMatch(['name'=>trim($d[3]),'rowno'=>($key+2),'attr'=>'Category','model'=>'\App\Category'])],
                    $d[4] = ['nullable', new DbMatch(['name'=>@$subcategory->name,'rowno'=>($key+2),'attr'=>'Sub Category','model'=>'\App\Category'])],
                ],[
                    '0.required'=>'Main Template Filled is required',
                    '2.required'=>'Template Filled is required',
                    '3.required'=>'Category Filled is required',
                ]);

                if ($validator->fails()) {
                    $messages = $validator->messages();
                    return \Redirect::back()->withErrors($messages)->withInput($d->toArray()); 
                }

                //$programData = ProgramTemplate::where('id',$programTemplate->id)->first();


                $program = Program::create([
                    'main_template_id'  => @$templateType->id,
                    'program_goal_id'   => @$programGoal ? $programGoal->id : null,
                    'template_id'       => @$programTemplate->id,
                    'category_id'       => @$category->id,
                    'subcategory_id'    => @$subcategory->id,
                    'day'               => @trim($d[5]) ? trim($d[5]) : null,
                    'sequence'          => @trim($d[6]) ? trim($d[6]) : null,
                    'series'            => @trim($d[7]) ? trim($d[7]) : null,
                    'tempo'             => @trim($d[8]) ? trim($d[8]) : null,
                    'rest'              => @trim($d[9]) ? trim($d[9]) : null,
                    'week1'             => @trim($d[10]) ? trim($d[10]) : null,
                    'week2'             => @trim($d[11]) ? trim($d[11]) : null,
                    'week3'             => @trim($d[12]) ? trim($d[12]) : null,
                    'week4'             => @trim($d[13]) ? trim($d[13]) : null,
                    'frequency'         => @trim($d[14]) ? trim($d[14]) : null,
                    'time'              => @trim($d[15]) ? trim($d[15]) : null,
                    'sets_reps'         => @trim($d[16]) ? trim($d[16]) : null,
                    'comment'           => @trim($d[17]) ? trim($d[17]) : null,
                   
                ]);
            }
        }
        // if($programData->day_id == 3){
        //     $programtemplate = Program::where('template_id',$programData->id)->whereNotNull('day')->get();
        //     $allarraydata = [];
        //     foreach ($programtemplate as $key => $value) {
        //         if($value->day == 1){
        //             $newdata = [
        //                 'main_template_id'=>$value->main_template_id,
        //                 'program_goal_id'=>$value->program_goal_id,
        //                 'template_id'=>$value->template_id,
        //                 'sport_id'=>$value->sport_id,
        //                 'category_id'=>$value->category_id,
        //                 'subcategory_id'=>$value->subcategory_id,
        //                 'day'=>3,
        //                 'sequence'=>$value->sequence,
        //                 'series'=>$value->series,
        //                 'tempo'=>$value->tempo,
        //                 'rest'=>$value->rest,
        //                 'week1'=>$value->week1,
        //                 'week3'=>$value->week3,
        //                 'frequency'=>$value->frequency,
        //                 'time'=>$value->time,
        //                 'sets_reps'=>$value->sets_reps,
        //                 'comment'=>$value->comment,
        //             ];
        //         }

        //         if($value->day == 2){
        //             $newdata->week2 =$value->week2;
        //             $newdata->week4 =$value->week4;
        //             // $ndata = [
        //             //     'week2'=>$value->week2,
        //             //     'week4'=>$value->week4,
        //             // ];

        //              $allarraydata[] = $newdata;
        //         }

               
                
        //         // array_walk($newdata, function (&$val, $key) {
        //         //     //dd($value);
        //         //     if($value->day == 2){
        //         //         if($key == 'week2'){ 
        //         //             $value = $value; 
        //         //         }
        //         //     }
                    
        //         // });
        //         // dd($newdata);
                
        //     }
        //     dd($allarraydata);
        //     Program::insert($allarraydata);
        // }

        
        return redirect()->back()->with('success', 'Program imported successfully');
    }

    public function createExercise()
    {
       return view('admin.exportImport.exercise');
    }

    public function importExercise(Request $request)
    {
    
        $data = Excel::toCollection(new ExerciseDataImport(), $request->file('document'));
        
        foreach($data[0] as $key=>$d){

             if($d->filter()->isNotEmpty()){

                $parent_cat = Category::where('name',trim($d[0]))->first();
                if($parent_cat){
                    $category = Category::where('parent_id',$parent_cat->id)->where('name',trim($d[1]))->with('recursiveparent')->first();
                }else{
                    $category = Category::where('name',trim($d[1]))->with('recursiveparent')->first();
                }
                
                $training_age = TrainingAge::where('name',trim($d[2]))->first();
                $athlete_option = AthleteProfile::where('name',trim($d[3]))->first();
                $block_focus = BlockFocus::where('name',trim($d[4]))->first();
                $name = trim($d[5]);
                $assessmentcat = AssessmentCategory::where('name',trim($d[6]))->first();
                
                $validator = Validator::make($d->toArray(),[
                    $d[0] = ['nullable', new DbMatch(['name'=>@$parent_cat->name,'rowno'=>($key+2),'attr'=>'Category','model'=>'\App\Category'])],
                    $d[1] = ['required', new CategoryMatch(['parent_id'=>$parent_cat ? $parent_cat->id : null,'rowno'=>($key+2),'name'=>trim($d[1])])],
                    $d[2] = ['nullable', new DbMatch(['name'=>trim($d[2]),'rowno'=>($key+2),'attr'=>'Training Age','model'=>'\App\TrainingAge'])],
                    $d[3] = ['nullable', new DbMatch(['name'=>trim($d[3]),'rowno'=>($key+2),'attr'=>'Athlete Profile','model'=>'\App\AthleteProfile'])],
                    $d[4] = ['nullable', new DbMatch(['name'=>trim($d[4]),'rowno'=>($key+2),'attr'=>'Block Focus','model'=>'\App\BlockFocus'])],
                    $d[5] = ['required'],
                    $d[6] = ['nullable', new DbMatch(['name'=>trim($d[6]),'rowno'=>($key+2),'attr'=>'Assessment Category','model'=>'\App\AssessmentCategory'])],
                ],[
                    '1.required'=>'Subcategory Filled Required',
                    '5.required'=>'Exercise Filled required',
                ]);
                if ($validator->fails()) {
                    $messages = $validator->messages();
                    return \Redirect::back()->withErrors($messages); 
                }


                // $cat = Category::where('name',trim($d[0]))->exists();
                // if(!$cat){
                //     $new[] = $d[0];
                //     continue;
                // }

                // $ids = getParentIds(Category::where('name',$d[0])->with('recursiveparent')->first());
                // $exerciseid = array_unique($ids);

                if($category){
                    $ids = getParentIds($category);
                    $exerciseid = array_unique($ids);

                     $exercise = Exercise::create([
                        'training_age_id'           => @$training_age->id,
                        'athlete_profile_id'        => @$athlete_option->id,
                        'block_focus_id'            => @$block_focus->id,
                        'assessment_category_id'    => @$assessmentcat->id,
                        'name'                      => @$name,
                    ]);

                    $exercise->category()->sync($exerciseid);
                }

            }
        }

        
        // if(!$cat){
        //     \Session::flash('new', array($new)); 
        //     return redirect()->back();
        // }
        return redirect()->back()->with('success', 'Exercise Imported Successfully');
    }
}

