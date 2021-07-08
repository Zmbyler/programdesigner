<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\UserProgramDetails;
use App\ProgramAssessment;
use App\ProgramTemplatePdf;
use App\AssessmentCatOption;
use App\UserProgramHeaderDetails;
use App\AssessmentCategory;
use App\UserProgramChart;
use App\ProgramControl;
use App\TemplateType;
use App\Program;
use Cache,Validator,Auth;

/**
 * @group User Program management
 *
 * APIs for managing User Programs
 */
class UserProgramManagementController extends Controller
{

    
    /**
    * User Program Create
    * @bodyParam assessment array required Assessment.
    * @bodyParam traiining_age numeric required Traiining Age.
    * @bodyParam traiining_block string required Traiining Block.
    * @bodyParam type string required Type.
    * @bodyParam athlete_type string required Athlete Type.
    * @bodyParam what_based string required Athlete Profile.
    * @bodyParam what_season string required Season.
    * @response {
        "success": true,
        "message": "User Program saved Successfully."
    }
    */
    public function saveUserProgram(Request $request) {
        $validator = Validator::make($request->all(),[
            'traiining_age'             =>'required',
            'traiining_block'           =>'required',
            'program_template'          =>'required',
            'day_id'                    =>'nullable',
            'type'                      =>'required|string',
            'assessment.*.id'                        =>'required',
            'assessment.*.slug'                      =>'required',
            'assessment.*.option'                    =>'required',
            
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->first();
            return response()->json(['success'=>false, 'message'=>$errors, 'data'=>[]]);
        }
        if($request->type == 'athlete') {
            $athleteValidator = Validator::make($request->all(),[
                'athlete_type'  =>'required',
                'what_based'    =>'required',
                'what_season'   =>'required',
            ]);
            if ($athleteValidator->fails()) {
                $errors = $athleteValidator->errors()->first();
                return response()->json(['success'=>false, 'message'=>$errors, 'data'=>[]]);
            }
        } else if($request->type == 'gen-pop') {
            $genPopValidator = Validator::make($request->all(),[
                'template'=>'required',
                'program_goal'=>'nullable',
            ]);
            if ($genPopValidator->fails()) {
                $errors = $genPopValidator->errors()->first();
                return response()->json(['success'=>false, 'message'=>$errors, 'data'=>[]]);
            }
        }
        $user = Auth::user();
        if($user) {
            $userprogram = [
                'user_id'=>$user->id,
                'traiining_age'=>json_encode($request->traiining_age),
                'traiining_block'=>$request->traiining_block,
                'type'=>$request->type,
                'athlete_type'=>$request->athlete_type,
                'what_based'=>$request->what_based,
                'what_season'=>$request->what_season,
                'program_goal'=>$request->program_goal,
                'day_id'=>$request->day_id,
                'program_template'=>$request->program_template,
                'template'=>$request->template ? $request->template : '3',
            ];
            $programdetails = UserProgramDetails::create($userprogram);
            if(count($request->assessment) > 0){
                foreach ($request->assessment as $value) 
                {
                    $assessmenttype = [
                        'program_detail_id'     => $programdetails->id,
                        'assessment_result_id'  => $value['id'],
                        'slug'                  => $value['slug'],
                        'option'                => $value['option'],
                    ];
                    ProgramAssessment::create($assessmenttype);
                    $data[] = ['id'=> $value['id'],'val'=> $value['option']];
                    $programdetails->update(['assessment_option'=>$data]);
                }
            }
            $userprogramdetails = UserProgramDetails::where('id',$programdetails->id)->first();
            if(@$userprogramdetails->assessment_option){
                $assessment_cat_id = null;
                $a = AssessmentCategory::all();
                foreach ($a as $key => $value) {
                    $array1 = implode(',',Arr::dot(json_decode($value->category_option,true)));
                    $cat = implode(',',Arr::dot(json_decode($userprogramdetails->assessment_option,true)));
                    if($array1 === $cat){
                        $assessment_cat_id = $value->id;
                    }
                }
            }else{
               $assessment_cat_id = null; 
            }
            $programdetails->update(['assessment_category_id'=>$assessment_cat_id]);

            return response()->json(['success'=>true, 'message'=>'User Program saved Successfully.']);
        } else {
          return response()->json(['success'=>false, 'message'=>'User Program not found', 'data'=>[]]); 
        }
    }

    /**
    * User Fetch Last Program
    * @bodyParam id string required Program ID.
    * @response {
        "success": true,
        "message": "Last Program fetched Successfully.",
        "data": [
            {
                "id": 10,
                "user_id": 29,
                "aslr": "Inhaled",
                "forthis": "individual",
                "infrasternal_angle": "Narrow",
                "shoulder_extension": "Inhaled",
                "shoulder_external": "Exhaled",
                "shoulder_flexion": "Inhaled",
                "supine_hip": "Inhaled",
                "template": null,
                "toe_touch": "Inhaled",
                "toe_touch_to_squat": "Exhaled",
                "traiining_age": 4,
                "traiining_block": "Accumulation Block",
                "type": "athlete",
                "athlete_type": "basketball",
                "what_based": "Kangaroo",
                "what_season": "Off-Season",
                "created_at": "2020-04-23 05:22:40",
                "updated_at": "2020-04-23 05:22:40"
            }
        ]
    }
    */

    public function fetchLastProgram($id) {
        $user = Auth::user();
        if($user) {
            if($id == 0){
                $query = UserProgramDetails::where('user_id', $user->id)->orderBy('created_at', 'DESC');
            } else {
                $query = UserProgramDetails::where('program_id', $id)->orderBy('created_at', 'DESC');
            }
            if($id == 0){
                if(@$query->first()->assessment_option){
                    $assessment_cat_id = [];
                    $a = AssessmentCategory::all();
                    foreach ($a as $key => $value) {
                        $array1 = implode(',',Arr::dot(json_decode($value->category_option,true)));
                        $cat = implode(',',Arr::dot(json_decode($query->first()->assessment_option,true)));
                        if($array1 === $cat){
                            $assessment_cat_id[] = $value->id;
                        }
                    }
                }else{
                   $assessment_cat_id = []; 
                }
                $assessmentcategory = AssessmentCategory::whereIn('id',$assessment_cat_id)->get();
            }else{
                $headerIndividual = UserProgramHeaderDetails::where('program_control_id',$id)->with('assessmentcategory')->get();
                $assessmentcategory=[];
            }
            $last_program_details = $query->first();
            $last_program_details['traiining_age'] = json_decode($last_program_details->traiining_age,true);
            $last_program_details['assessment_category_id'] = json_decode($last_program_details->assessment_category_id,true);
            
            if($last_program_details) {
                $template_id = $last_program_details->template;
                
                if($id == 0) {
                    return response()->json(['success'=>true, 'message'=>'Last Program fetched Successfully.', 'template'=>$template_id,'data' => $last_program_details,'assessmentcategory'=>$assessmentcategory]);
                } else {

                    $data = ProgramControl::where('id', $id)->first();
                    $data->type = $last_program_details->type;
                    $data->template = $last_program_details->template;
                    $data->traiining_age = json_decode($data->training_level,true);
                    unset($data->training_level);
                    return response()->json(['success'=>true, 'message'=>'Last Program fetched Successfully.', 'template'=>$template_id,'data' => $data,'assessmentcategory'=>$assessmentcategory,'headerIndividual'=>$headerIndividual]);
                }
                
            } else {
                return response()->json(['success'=>false, 'message'=>'No program found', 'data'=>[]]); 
            }
        } else {
          return response()->json(['success'=>false, 'message'=>'Program not found', 'data'=>[]]); 
        }
    }

    /**
    * User Program Control Create
    * @bodyParam block_focus integer required Block Focus.
    * @bodyParam training_level integer required Training Level.
    * @bodyParam assessment_results integer required Assessment Results.
    * @bodyParam athlete_profile integer required Athlete Profile.
    * @bodyParam season integer required Season.
    * @bodyParam sport integer required Sport.
    * @bodyParam program_name string required Program Name.
    * @bodyParam last_program_id integer required Program ID.
    * @bodyParam programChartData string required Program Chart Data.
    * @response {
        "success": true,
        "message": "User Program Control saved Successfully."
    }
    */

    public function saveProgramControl(Request $request) {
        $user = Auth::user();
        $request->merge(['user_id' => $user->id]);
        $input = $request->all();
        $validator = Validator::make($request->all(),[
            'block_focus'       =>'required',
            'training_level'    =>'required',
            'assessment_category_id'=>'nullable',
            'program_name'      =>'required|string|unique:program_controls',
            
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->first();
            return response()->json(['success'=>false, 'message'=>$errors, 'data'=>[]]);
        }
        if($user) {

            if($request->has('headerIndividual')){
                $individualValidator = Validator::make($request->all(),[
                    'headerIndividual.*.name'                   =>'nullable',
                    'headerIndividual.*.program_goal'           =>'nullable',
                    'headerIndividual.*.coach_notes'            =>'nullable',
                    'headerIndividual.*.assessment_category_id' =>'nullable',
                ]);
                if ($individualValidator->fails()) {
                    $errors = $individualValidator->errors()->first();
                    return response()->json(['success'=>false, 'message'=>$errors, 'data'=>[]]);
                }
            }elseif($request->has('headerSgpt')){
                $headerSgpt = Validator::make($request->all(),[
                    'headerSgpt.*.name'               =>'nullable',
                    'headerSgpt.*.program_goal'       =>'nullable',
                    //'headerSgpt.*.checkIn'            =>'required',
                ]);
                if ($headerSgpt->fails()) {
                    $errors = $headerSgpt->errors()->first();
                    return response()->json(['success'=>false, 'message'=>$errors, 'data'=>[]]);
                } 
            }elseif($request->has('headerAthlete')){
                $headerAthlete = Validator::make($request->all(),[
                    'headerAthlete.*.name'               =>'nullable',
                    'headerAthlete.*.program_goal'       =>'nullable',
                    'headerAthlete.*.comments'            =>'nullable',
                ]);
                if ($headerAthlete->fails()) {
                    $errors = $headerAthlete->errors()->first();
                    return response()->json(['success'=>false, 'message'=>$errors, 'data'=>[]]);
                } 
            }

            
            // save program control
            $input['training_level'] = json_encode($request->training_level);
            $program_control_details = ProgramControl::create($input);
            // save program_id in user program details table
            $user_program_details = UserProgramDetails::where('id', $input['last_program_id'])->first();
            $user_program_details->update([
                'program_id' => $program_control_details->id
            ]);

            if($request->has('headerIndividual')){
                foreach ($request->headerIndividual as $key => $headerdata) {
                    $headerindividual = [
                        'user_id'               =>$user->id,
                        'program_control_id'    =>$program_control_details->id,
                        'name'                  =>$headerdata['name'],
                        'program_goal'          =>$headerdata['program_goal'],
                        'coach_notes'           =>$headerdata['coach_notes'],
                        'assessment_category_id'=>$headerdata['assessment_category_id'],
                    ];

                    UserProgramHeaderDetails::create($headerindividual);
                }
            }elseif($request->has('headerSgpt')){
                foreach ($request->headerSgpt as $key => $headerdata){
                    $headerSgpt = [
                        'user_id'           =>$user->id,
                        'program_control_id'=>$program_control_details->id,
                        'name'              =>$headerdata['name'],
                        'program_goal'      =>$headerdata['program_goal'],
                        //'checkIn'=>$headerdata['checkIn'],
                    ];

                    UserProgramHeaderDetails::create($headerSgpt);
                }
            }elseif($request->has('headerAthlete')){
                foreach ($request->headerAthlete as $key => $headerdata){
                    $headerAthlete = [
                        'user_id'           =>$user->id,
                        'program_control_id'=>$program_control_details->id,
                        'name'              =>$headerdata['name'],
                        'program_goal'      =>$headerdata['program_goal'],
                        'comments'          =>$headerdata['comments'],
                    ];

                    UserProgramHeaderDetails::create($headerAthlete);
                }
            }
            

            $data = $input['programChartData'];
            foreach($data as $dayData) {
                foreach($dayData as $categoryData) {
                    foreach($categoryData as $subcategoryData) {
                        $subcategoryData = (array)$subcategoryData;
                        //dd( is_multi($subcategoryData));
                        if(is_multi($subcategoryData) == false){
                            $exercise_id = 0;
                            if (array_key_exists("exercise_id",$subcategoryData)) 
                            {
                                $exercise_id = $subcategoryData['exercise_id'];
                            }
                            $subcategoryData['user_id']     = Auth::user()->id;
                            $subcategoryData['exercise_id'] = $exercise_id;
                            $subcategoryData['program_id']  = $program_control_details->id;
                            UserProgramChart::create($subcategoryData);
                        }

                        if(is_multi($subcategoryData) == true){
                            foreach ($subcategoryData as $key => $dataval) {
                                $exercise_id = 0;
                                if (array_key_exists("exercise_id",$dataval)) 
                                {
                                    $exercise_id = $dataval['exercise_id'];
                                }
                                $dataval['user_id']     = Auth::user()->id;
                                $dataval['exercise_id'] = $exercise_id;
                                $dataval['program_id']  = $program_control_details->id;
                                UserProgramChart::create($dataval);
                            }
                        }
                        // if(@$subcategoryData['id']){
                        //     $dataval = $subcategoryData;
                        //     $exercise_id = 0;
                        //     if (array_key_exists("exercise_id",$dataval)) 
                        //     {
                        //         $exercise_id = $dataval['exercise_id'];
                        //     }
                        //     $dataval['user_id'] = Auth::user()->id;
                        //     $dataval['exercise_id'] = $exercise_id;
                        //     $dataval['program_id'] = $program_control_details->id;
                        //     UserProgramChart::create($dataval);
                        // }
                        // if(!@$subcategoryData['id']){
                        //     foreach ($subcategoryData as $key => $value) {
                        //         $dataval = $value;
                        //         $exercise_id = 0;
                        //         if (array_key_exists("exercise_id",$dataval)) 
                        //         {
                        //             $exercise_id = $dataval['exercise_id'];
                        //         }
                        //         $dataval['user_id'] = Auth::user()->id;
                        //         $dataval['exercise_id'] = $exercise_id;
                        //         $dataval['program_id'] = $program_control_details->id;
                        //         UserProgramChart::create($dataval);
                        //     }
                        // }
                    }
                }
            }
            
            return response()->json(['success'=>true, 'message'=>'User Program Control saved Successfully.','previousProgramId'=>$program_control_details->id]);
        } else {
          return response()->json(['success'=>false, 'message'=>'Program not found', 'data'=>[]]); 
        }
    }

    /**
    * User Fetch Program Chart Details
    * @bodyParam main_template_id string required Main Template Id.
    * @bodyParam program_goal_id string Program Goal Id.
    * @bodyParam template_id string Template Id.
    * @bodyParam what_season string What Season.
    * @bodyParam traiining_block string Traiining Block.
    * @bodyParam what_based string What Based.
    * @bodyParam training_age string Training Age.
    * @response {
        "success": true,
        "message": "Program Chart Details fetched Successfully.",
        "data": [
            {
                "template": 1,
                "first_portion": [
                    {
                        "R1": [
                            {
                                "subcategory": "Postural Resets",
                                "frequency": "\r\n",
                                "time": "\r\n",
                                "sets_reps": "2x5 breaths\r\n",
                                "exercises": []
                            }
                        ]
                    }
                ],
                "second_portion": [
                    {
                        "day1": [
                            {
                                "R4": [
                                    {
                                        "id": 3,
                                        "main_template_id": 1,
                                        "program_goal_id": 1,
                                        "template_id": 37,
                                        "category_id": 24,
                                        "subcategory_id": 98,
                                        "tempo": "",
                                        "rest": "",
                                        "week1": "3x5",
                                        "week2": "3x5",
                                        "week3": "3x5",
                                        "week4": "3x5",
                                        "day": "1",
                                        "sequence": "",
                                        "frequency": null,
                                        "time": null,
                                        "sets_reps": null,
                                        "status": 1,
                                        "created_at": null,
                                        "updated_at": null,
                                        "exercises": [
                                            {
                                                "id": 512,
                                                "name": "Snap Down + Lateral Broad Jump",
                                                "category_id": 24,
                                                "subcategory_id": 98,
                                                "training_age": 1,
                                                "athlete_option": "Gorilla",
                                                "status": 1,
                                                "created_at": "2020-04-16 05:25:05",
                                                "updated_at": "2020-04-16 05:25:05"
                                            }
                                        ] 
                                    }
                                ]
                            }
                        ]
                    }
                ]
            }
        ]
    }

   
    */
    // athlete_type 2 (vollyball)
    // what_based Kangaroo
    // what_season 2 (Off-Season)
    // traiining_block Intensification
    // traiining_age 2


    public function fetchProgramChartDetails(Request $request) 
    {

        $validator = Validator::make($request->all(),[
            'main_template_id'      => 'required',
            'program_goal_id'       => 'nullable',
            'template_id'           => 'nullable',
            'what_season'           => 'nullable',
            'traiining_block'       => 'nullable',
            'what_based'            => 'nullable',
            'traiining_age'         => 'nullable|array',
            'program_details_id'    => 'nullable',
            'program_id'            => 'nullable',
        ]);

        if($validator->fails())
        {
            $errors = $validator->errors()->first();
            return response()->json(['success'=>false,'message'=>$errors]);
        }

        $user               = Auth::user();
        $input              = $request->input();
        $main_template_id   = $input['main_template_id'];
        $program_goal_id    = $input['program_goal_id'];
        $template_id        = $input['template_id'];

        if($request->filled('program_id'))
        {

            $user = Auth::user();
            

            $query = UserProgramChart::where('user_id',$user->id)->where('program_id',$request->program_id);

            if($request->filled('program_goal_id'))
            {
                $query = $query->where('program_goal_id', $request->program_goal_id);

                if($request->filled('template_id'))
                {
                    $query = $query->where('template_id', $request->template_id);
                }
            }else{
               if($request->filled('template_id'))
                {
                    $query = $query->where('template_id', $request->template_id);
                } 
            }
            $categories = $query->distinct()->pluck('category_id');
            $days       = $query->distinct()->pluck('day')->toArray();
            $days       = array_filter($days);

            $sequences  = $query->distinct()->pluck('sequence')->toArray();
            $sequences  = array_filter($sequences);

            $programs   = $query->with('template')->with(['category.exercisesub'=>function($q) use($request)
            {
                if($request->has('assessment_category_id') && $request->filled('assessment_category_id'))
                {
                    $q->where('assessment_category_id',$request->assessment_category_id)->orWhereNull('assessment_category_id');
                }

                if($request->filled('traiining_block'))
                {
                    $q->where('block_focus_id',$request->traiining_block)->OrWhereNull('block_focus_id');
                }

                if($request->filled('what_based'))
                {
                    $q->where('athlete_profile_id',$request->what_based)->OrWhereNull('athlete_profile_id');
                }

                if(count($request->traiining_age) > 0){

                    $q->whereIn('training_age_id', $request->traiining_age)->OrWhereNull('training_age_id');
                }

            }])->with(['subcategory.exercisesub'=>function($que) use($request){

                if($request->has('assessment_category_id') && $request->filled('assessment_category_id'))
                {
                    $que->where('assessment_category_id',$request->assessment_category_id)->orWhereNull('assessment_category_id');
                }

                if($request->filled('traiining_block'))
                {
                    $que->where('block_focus_id',$request->traiining_block)->OrWhereNull('block_focus_id');
                }

                if($request->filled('what_based'))
                {
                    $que->where('athlete_profile_id',$request->what_based)->OrWhereNull('athlete_profile_id');
                }

                if(count($request->traiining_age) > 0)
                {
                    $que->whereIn('training_age_id', $request->traiining_age)->OrWhereNull('training_age_id');
                }

            }])->with(['blockfocuscategory'=>function($quer) use($request){

                if($request->has('traiining_block') && $request->filled('traiining_block')){
                    
                    $quer->where('block_focus_id',$request->traiining_block);
                }

            }])->get();
            
            $query2 = UserProgramChart::where('user_id',$user->id)->where('program_id',$request->program_id);
            if($request->filled('program_goal_id'))
            {
                $query2 = $query2->where('program_goal_id', $request->program_goal_id);

                if($request->filled('template_id'))
                {
                    $query2 = $query2->where('template_id', $request->template_id);
                }
            }else{
                if($request->filled('template_id'))
                {
                    $query2 = $query2->where('template_id', $request->template_id);
                }
            }
            $pdata = [];
            $category_ids   = $query2->whereNull('day')->distinct()->pluck('category_id');
            $programData    = $query2->with('category.exercisesub','subcategory.exercisesub')->whereIn('category_id',$category_ids)->get();
            
            foreach ($programData as $key => $programvalue) {
                $pdata[str_replace(' ','_',$programvalue->category->name)][]=$programvalue;
            }
                
            
            $programs_w_day = [];
            $programs_wo_day = [];

            
              foreach($programs as $eachProgram){
                    //return $eachProgram['day'];
                    if($eachProgram['day']){
                        if($eachProgram->series == null){
                            foreach($days as $eachDay){ // all days
                                foreach($categories as $eachCategory){ // all categories
                                    if($eachProgram['day'] == $eachDay){
                                        if($eachProgram->category_id == $eachCategory){
                                            if(!is_null($eachProgram->blockfocuscategory)){
                                                $eachProgram->tempo = $eachProgram->blockfocuscategory->tempo;
                                                $eachProgram->comment = $eachProgram->blockfocuscategory->rep.','.$eachProgram->blockfocuscategory->kangaroo_vbt.','.$eachProgram->blockfocuscategory->gorilla_vbt;
                                            }
                                            $programs_w_day['day'.$eachDay][$eachProgram->category->name][] = $eachProgram;
                                        }
                                    }
                                }
                            }
                        }else{
                            foreach($days as $eachDay) { // all days
                                foreach($categories as $eachCategory) { // all categories
                                    foreach($sequences as $sequence){ //all sequence
                                        if($eachProgram['day'] == $eachDay) {
                                            if($eachProgram->category_id == $eachCategory) {
                                                if($eachProgram->sequence == $sequence){
                                                    if(!is_null($eachProgram->blockfocuscategory)){
                                                        $eachProgram->tempo = $eachProgram->blockfocuscategory->tempo;
                                                        $eachProgram->comment = $eachProgram->blockfocuscategory->rep.','.$eachProgram->blockfocuscategory->kangaroo_vbt.','.$eachProgram->blockfocuscategory->gorilla_vbt;
                                                    }
                                                    $programs_w_day['day'.$eachDay][$eachProgram->category->name][$sequence][] = $eachProgram;
                                                }
                                            }
                                        }  
                                    }
                                }
                            }
                        }
                    }
                }

            $final_data = ['template'=>$request->main_template_id,'first_portion' => $pdata,'second_portion' => $programs_w_day];
            if($user) {
                return response()->json(['success'=>true, 'message'=>'Program Chart Details fetched Successfully.', 'data'=>$final_data]);
            } else {
              return response()->json(['success'=>false, 'message'=>'Program Chart Details not found', 'data'=>[]]); 
            }    

        }else{
            
            if($request->main_template_id) {
                $query = Program::where('main_template_id', $main_template_id);

                if($request->has('program_details_id')){
                    if($request->filled('program_details_id')){
                        $userprogramdetails = UserProgramDetails::where('id',$request->program_details_id)->first();
                        if(@$userprogramdetails->assessment_option){
                            $assessment_cat_id = [];
                            $a = AssessmentCategory::all();
                            foreach ($a as $key => $value) {
                                $array1 = implode(',',Arr::dot(json_decode($value->category_option,true)));
                                $cat = implode(',',Arr::dot(json_decode($userprogramdetails->assessment_option,true)));
                                if($array1 === $cat){
                                    $assessment_cat_id[] = $value->id;
                                }
                            }
                        }else{
                           $assessment_cat_id = []; 
                        }
                    }else{
                        $assessment_cat_id = [];
                    }  

                } else{

                    $assessment_cat_id = [];
                }  

                if($request->filled('program_goal_id'))
                {
                    $query = $query->where('program_goal_id', $request->program_goal_id);

                    if($request->filled('template_id'))
                    {
                        $query = $query->where('template_id', $request->template_id);
                    }
                }else{
                    if($request->filled('template_id'))
                    {
                        $query = $query->where('template_id', $request->template_id);
                    }
                }

                $categories = $query->distinct()->pluck('category_id');
                $days       = $query->distinct()->pluck('day')->toArray();
                $days       = array_filter($days);
                $sequences  = $query->distinct()->pluck('sequence')->toArray();
                $sequences  = array_filter($sequences);

                $programs = $query->with('template')->with(['category.exercisesub'=>function($q) use($request,$assessment_cat_id)
                {
                    $q->whereIn('assessment_category_id',$assessment_cat_id)->OrWhereNull('assessment_category_id');

                    if($request->has('assessment_category_id') && $request->filled('assessment_category_id'))
                    {
                        $q->where('assessment_category_id',$request->assessment_category_id)->orWhereNull('assessment_category_id');
                    }

                    if($request->filled('traiining_block'))
                    {
                        $q->where('block_focus_id',$request->traiining_block)->OrWhereNull('block_focus_id');
                    }

                    if($request->filled('what_based'))
                    {
                        $q->where('athlete_profile_id',$request->what_based)->OrWhereNull('athlete_profile_id');
                    }

                    if(count($request->traiining_age) > 0){

                        $q->whereIn('training_age_id', $request->traiining_age);
                    }

                }])->with(['subcategory.exercisesub'=>function($que) use($request,$assessment_cat_id){

                    $que->whereIn('assessment_category_id',$assessment_cat_id)->OrWhereNull('assessment_category_id');
                    
                    if($request->has('assessment_category_id') && $request->filled('assessment_category_id'))
                    {
                        $que->where('assessment_category_id',$request->assessment_category_id)->orWhereNull('assessment_category_id');
                    
                    }
                    if($request->filled('traiining_block'))
                    {
                        $que->where('block_focus_id',$request->traiining_block)->OrWhereNull('block_focus_id');
                    }

                    if($request->filled('what_based'))
                    {
                        $que->where('athlete_profile_id',$request->what_based)->OrWhereNull('athlete_profile_id');
                    }

                    if(count($request->traiining_age) > 0)
                    {
                        $que->whereIn('training_age_id', $request->traiining_age);
                    }

                }])->with(['blockfocuscategory'=>function($quer) use($request){

                    if($request->has('traiining_block') && $request->filled('traiining_block')){
                        
                        $quer->where('block_focus_id',$request->traiining_block);
                    }

                }])->get();

                $first_portion_query = Program::where('main_template_id', $main_template_id);

                if($request->filled('program_goal_id'))
                {
                    $first_portion_query = $first_portion_query->where('program_goal_id', $request->program_goal_id);

                    if($request->filled('template_id'))
                    {
                        $first_portion_query = $first_portion_query->where('template_id', $request->template_id);
                    }
                }else{
                    if($request->filled('template_id'))
                    {
                        $first_portion_query = $first_portion_query->where('template_id', $request->template_id);
                    }
                }

                $pdata = [];
                $category_ids = $first_portion_query->whereNull('day')->distinct()->pluck('category_id');
                $programData  = $first_portion_query->with('category.exercisesub','subcategory.exercisesub')->whereIn('category_id',$category_ids)->get();
                
                foreach ($programData as $key => $programvalue) 
                {
                    $pdata[str_replace(' ','_',$programvalue->category->name)][]=$programvalue;
                }
                
                $programs_w_day = [];
                // data manipulation
                foreach($programs as $eachProgram){
                    //return $eachProgram['day'];
                    if($eachProgram['day']){
                        if($eachProgram->series == null){
                            foreach($days as $eachDay){ // all days
                                foreach($categories as $eachCategory){ // all categories
                                    if($eachProgram['day'] == $eachDay){
                                        if($eachProgram->category_id == $eachCategory){
                                            if(!is_null($eachProgram->blockfocuscategory)){
                                                $eachProgram->tempo = $eachProgram->blockfocuscategory->tempo;
                                                $eachProgram->comment = $eachProgram->blockfocuscategory->rep.','.$eachProgram->blockfocuscategory->kangaroo_vbt.','.$eachProgram->blockfocuscategory->gorilla_vbt;
                                            }
                                            $programs_w_day['day'.$eachDay][$eachProgram->category->name][] = $eachProgram;
                                        }
                                    }
                                }
                            }
                        }else{
                            foreach($days as $eachDay) { // all days
                                foreach($categories as $eachCategory) { // all categories
                                    foreach($sequences as $sequence){ //all sequence
                                        if($eachProgram['day'] == $eachDay) {
                                            if($eachProgram->category_id == $eachCategory) {
                                                if($eachProgram->sequence == $sequence){
                                                    if(!is_null($eachProgram->blockfocuscategory)){
                                                        $eachProgram->tempo = $eachProgram->blockfocuscategory->tempo;
                                                        $eachProgram->comment = $eachProgram->blockfocuscategory->rep.','.$eachProgram->blockfocuscategory->kangaroo_vbt.','.$eachProgram->blockfocuscategory->gorilla_vbt;
                                                    }
                                                    $programs_w_day['day'.$eachDay][$eachProgram->category->name][$sequence][] = $eachProgram;
                                                }
                                            }
                                        }  
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        
        
        $final_data = ['template' => $main_template_id,'first_portion' => $pdata,'second_portion' => $programs_w_day];
        if($user) {
            return response()->json(['success'=>true, 'message'=>'Program Chart Details fetched Successfully.', 'data'=>$final_data]);
        } else {
          return response()->json(['success'=>false, 'message'=>'Program Chart Details not found', 'data'=>[]]); 
        }
    
    }

     /**
    * User Get All Program Chart Details
    * @response {
        "success": true,
        "message": "Program Name Details fetched Successfully.",
        "data": [
        {
            "id": 18,
            "user_id": 16,
            "block_focus": 6,
            "athlete_profile": null,
            "season": null,
            "sport": null,
            "assessment_results": 3,
            "training_level": 3,
            "program_template": 50,
            "program_goal": 1,
            "days": 5,
            "program_name": "test2",
            "created_at": "2020-05-05 05:43:59",
            "updated_at": "2020-05-05 05:43:59"
        }
    ]
    **/
    public function getAllProgram()
    {
        $user = Auth::user();
        $programcontrol = ProgramControl::where('user_id',$user->id)->orderBy('id','desc')->get();

        if($programcontrol){
            return response()->json(['success'=>true, 'message'=>'Program Name Details fetched Successfully.', 'data'=>$programcontrol]);
        }else{
            return response()->json(['success'=>false, 'message'=>'Program Name details not found', 'data'=>[]]); 
        }
    }
     /**
    * User Edit Program Chart Details
    * @response {
        "success": true,
        "message": "Program Chart Details fetched Successfully.",
        "data": [
            {
                "template": 1,
                "first_portion": [
                    {
                        "R1": [
                            {
                                "subcategory": "Postural Resets",
                                "frequency": "\r\n",
                                "time": "\r\n",
                                "sets_reps": "2x5 breaths\r\n",
                                "exercises": []
                            }
                        ]
                    }
                ],
                "second_portion": [
                    {
                        "day1": [
                            {
                                "R4": [
                                    {
                                        "id": 3,
                                        "main_template_id": 1,
                                        "program_goal_id": 1,
                                        "template_id": 37,
                                        "category_id": 24,
                                        "subcategory_id": 98,
                                        "tempo": "",
                                        "rest": "",
                                        "week1": "3x5",
                                        "week2": "3x5",
                                        "week3": "3x5",
                                        "week4": "3x5",
                                        "day": "1",
                                        "sequence": "",
                                        "frequency": null,
                                        "time": null,
                                        "sets_reps": null,
                                        "status": 1,
                                        "created_at": null,
                                        "updated_at": null,
                                        "exercises": [
                                            {
                                                "id": 512,
                                                "name": "Snap Down + Lateral Broad Jump",
                                                "category_id": 24,
                                                "subcategory_id": 98,
                                                "training_age": 1,
                                                "athlete_option": "Gorilla",
                                                "status": 1,
                                                "created_at": "2020-04-16 05:25:05",
                                                "updated_at": "2020-04-16 05:25:05"
                                            }
                                        ] 
                                    }
                                ]
                            }
                        ]
                    }
                ]
            }
        ]
    }
    **/
    public function editProgramChartDetails($id){
      
        $user = Auth::user();
        $query = UserProgramChart::where('user_id',$user->id)->where('program_id',$id);
        $programs = $query->with('category.exercisesub','subcategory.exercisesub')->get();
        $categories = $query->distinct()->pluck('category_id');
        $days = $query->distinct()->pluck('day')->toArray();
        $days = array_filter($days);

        $main_template_id = $query->distinct()->value('main_template_id');
        $query2 = UserProgramChart::where('user_id',$user->id)->where('program_id',$id);
        $category_ids = $query2->distinct()->where('day',Null)->pluck('category_id')->toArray();
        $programData = $query2->with('category.exercisesub','subcategory.exercisesub')->whereIn('category_id',$category_ids)->get();

        $pdata = [];
        foreach ($programData as $key => $programvalue) {
            $pdata[$programvalue->category->name][]=$programvalue;
        }

        $programs_w_day = [];
        $programs_wo_day = [];

        
        // data manipulation
        foreach($programs as $eachProgram){
            if(!empty($eachProgram['day'])) {
                foreach($days as $eachDay) { // all days
                    foreach($categories as $eachCategory) { // all categories
                        if($eachProgram['day'] == $eachDay) {
                            if($eachProgram->category_id == $eachCategory) {
                                $programs_w_day['day'.$eachDay][$eachProgram->category->name][] = $eachProgram;

                            }
                        }
                    }
                }
            } else {
                $programs_wo_day = $pdata;
            }
        }
        $final_data = ['template'=>$main_template_id,'first_portion' => $programs_wo_day,'second_portion' => $programs_w_day];
        if($user) {
            return response()->json(['success'=>true, 'message'=>'Program Chart Details fetched Successfully.', 'data'=>$final_data]);
        } else {
          return response()->json(['success'=>false, 'message'=>'Program Chart Details not found', 'data'=>[]]); 
        }    
    }
     /**
    * Program Deleted by id
    * @response {
        "success": true,
        "message": "Program Deleted Successfully."
    }
    */

    public function deleteProgram($id)
    {
        $user = Auth::user();
        $programcontrol = ProgramControl::where('id',$id)->first();
        if($programcontrol){
            UserProgramChart::where('user_id',$user->id)->where('program_id',$programcontrol->id)->delete();
            UserProgramDetails::where('user_id',$user->id)->where('program_id',$programcontrol->id)->delete();
            ProgramTemplatePdf::where('program_controls_id',$programcontrol->id)->delete();
            $programcontrol->delete();
            return response()->json(['success'=>true, 'message'=>'Program Deleted Successfully.']);
        }else{
            return response()->json(['success'=>false, 'message'=>'Program Not Found.']);
        }
        
    }

    /**
    * User Program Control Update
    * @bodyParam program_id integer required Program ID.
    * @bodyParam block_focus integer required Block Focus.
    * @bodyParam training_level integer required Training Level.
    * @bodyParam assessment_results integer required Assessment Results.
    * @bodyParam athlete_profile integer required Athlete Profile.
    * @bodyParam season integer required Season.
    * @bodyParam sport integer required Sport.
    * @bodyParam program_name string required Program Name.
    * @bodyParam programChartData string required Program Chart Data.
    * @response {
        "success": true,
        "message": "User Program Control updated Successfully."
    }
    */
    public function updateProgramControl(Request $request) {
        $user = Auth::user();
        $request->merge(['user_id' => $user->id]);
        $input = $request->all();
        $validator = Validator::make($request->all(),[
            'program_id'            =>'required',
            'block_focus'           =>'required',
            'training_level'        =>'required',
            'assessment_category_id'=>'nullable',
            'program_name'          =>'required|string',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->first();
            return response()->json(['success'=>false, 'message'=>$errors, 'data'=>[]]);
        }
        if($user){

            if($request->has('headerIndividual')){
                $individualValidator = Validator::make($request->all(),[
                    'headerIndividual.*.name'                   =>'nullable',
                    'headerIndividual.*.program_goal'           =>'nullable',
                    'headerIndividual.*.coach_notes'            =>'nullable',
                    'headerIndividual.*.assessment_category_id' =>'nullable',
                ]);
                if ($individualValidator->fails()) {
                    $errors = $individualValidator->errors()->first();
                    return response()->json(['success'=>false, 'message'=>$errors, 'data'=>[]]);
                }
            }elseif($request->has('headerSgpt')){
                $headerSgpt = Validator::make($request->all(),[
                    'headerSgpt.*.name'               =>'nullable',
                    'headerSgpt.*.program_goal'       =>'nullable',
                    //'headerSgpt.*.checkIn'            =>'required',
                ]);
                if ($headerSgpt->fails()) {
                    $errors = $headerSgpt->errors()->first();
                    return response()->json(['success'=>false, 'message'=>$errors, 'data'=>[]]);
                } 
            }elseif($request->has('headerAthlete')){
                $headerAthlete = Validator::make($request->all(),[
                    'headerAthlete.*.name'               =>'nullable',
                    'headerAthlete.*.program_goal'       =>'nullable',
                    'headerAthlete.*.comments'           =>'nullable',
                ]);
                if ($headerAthlete->fails()) {
                    $errors = $headerAthlete->errors()->first();
                    return response()->json(['success'=>false, 'message'=>$errors, 'data'=>[]]);
                } 
            }

            $program_control_details = ProgramControl::find($input['program_id']);
            if($program_control_details) {
                $user_program_chart_data = $program_control_details->userProgramChartData;
                // update program control
                $program_control_details->update($input);
                if(count($user_program_chart_data) > 0) {
                    // remove previous chart details from DB
                    foreach($user_program_chart_data as $singleData) {
                        $singleData->delete();
                    }
                }

                if($request->has('headerIndividual')){
                    foreach ($request->headerIndividual as $key => $headerdata) {
                        $userprogram = UserProgramHeaderDetails::where('id',$headerdata['id'])->first();
                        $headerindividual = [
                            'name'                  =>$headerdata['name'],
                            'program_goal'          =>$headerdata['program_goal'],
                            'coach_notes'           =>$headerdata['coach_notes'],
                            'assessment_category_id'=>$headerdata['assessment_category_id'],
                        ];
                        $userprogram->update($headerindividual);
                    }
                }elseif($request->has('headerSgpt')){
                    foreach ($request->headerSgpt as $key => $headersgpt) {
                        $userprogram = UserProgramHeaderDetails::where('id',$headersgpt['id'])->first();
                        $headerSgpt = [
                            'name'          =>$headersgpt['name'],
                            'program_goal'  =>$headersgpt['program_goal'],
                        ];
                        $userprogram->update($headerSgpt);
                    }
                }elseif($request->has('headerAthlete')){
                    foreach ($request->headerAthlete as $key => $headerAthlete) {

                        $userprogram = UserProgramHeaderDetails::where('id',$headerAthlete['id'])->first();
                        $headerAthlete = [
                            'name'          =>$headerAthlete['name'],
                            'program_goal'  =>$headerAthlete['program_goal'],
                            'comments'      =>$headerAthlete['comments'],
                        ];
                        $userprogram->update($headerAthlete);
                    }
                }

                // add new chart details to DB
                $data = $input['programChartData'];
                foreach($data as $dayData) {
                    foreach($dayData as $categoryData) {
                        foreach($categoryData as $subcategoryData){
                            $subcategoryData = (array)$subcategoryData;
                            if(is_multi($subcategoryData) == false){
                                $exercise_id = 0;
                                if (array_key_exists("exercise_id",$subcategoryData)) 
                                {
                                    $exercise_id = $subcategoryData['exercise_id'];
                                }
                                $subcategoryData['user_id'] = Auth::user()->id;
                                $subcategoryData['exercise_id'] = $exercise_id;
                                $subcategoryData['program_id'] = $program_control_details->id;
                                UserProgramChart::create($subcategoryData);
                            }

                            if(is_multi($subcategoryData) == true){
                                foreach ($subcategoryData as $key => $sequenceData) {
                                    $exercise_id = 0;
                                    if (array_key_exists("exercise_id",$sequenceData)) 
                                    {
                                        $exercise_id = $sequenceData['exercise_id'];
                                    }
                                    $sequenceData['user_id'] = Auth::user()->id;
                                    $sequenceData['exercise_id'] = $exercise_id;
                                    $sequenceData['program_id'] = $program_control_details->id;
                                    UserProgramChart::create($sequenceData);
                                }
                            }
                        }
                    }
                }

                return response()->json(['success'=>true, 'message'=>'User Program Control updated Successfully.','previousProgramId'=>$input['program_id']]);
            } else {
                return response()->json(['success'=>false, 'message'=>'Program not found', 'data'=>[]]); 
            }
        } else {
          return response()->json(['success'=>false, 'message'=>'Program not found', 'data'=>[]]); 
        }
    }
}
