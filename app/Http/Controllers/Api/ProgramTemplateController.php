<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProgramTemplate;
use App\TemplateType;
use App\ProgramGoal;
use App\Role;
use Auth,Validator;


/**
 * @group ProgramTemplate management
 *
 * APIs for managing ProgramTemplate
 */
class ProgramTemplateController extends Controller
{
	/**
    * ProgramTemplate Details
    * @response {
		"success": true,
		"message": "Program Template Data Found successfully.",
		"data": [
        {
            "id": 1,
            "name": "Individual Templates",
            "created_at": null,
            "updated_at": null,
            "programtemplate": [],
            "programgoal": [
                {
                    "id": 1,
                    "name": "Weight Loss",
                    "template_type_id": 1,
                    "created_at": null,
                    "updated_at": null,
                    "goaltemplate": [
                        {
                            "id": 3,
                            "name": "FLStrength2",
                            "user_id": 1,
                            "template_type_id": 1,
                            "program_goal_id": 1,
                            "status": 1,
                            "added_by": "admin",
                            "created_at": "2020-04-09 12:55:46",
                            "updated_at": "2020-04-09 12:55:46"
                        }
                    ]
                },
                {
                    "id": 2,
                    "name": "Strength",
                    "template_type_id": 1,
                    "created_at": null,
                    "updated_at": null,
                    "goaltemplate": []
                },
                {
                    "id": 3,
                    "name": "Muscle",
                    "template_type_id": 1,
                    "created_at": null,
                    "updated_at": null,
                    "goaltemplate": []
                }
            ]
        },
        {
            "id": 2,
            "name": "SGPT Templates",
            "created_at": null,
            "updated_at": null,
            "programgoal": [],
            "programtemplate": [
                {
                    "id": 11,
                    "name": "TrisetsDescending",
                    "user_id": 1,
                    "template_type_id": 2,
                    "program_goal_id": 0,
                    "status": 1,
                    "added_by": "admin",
                    "created_at": "2020-04-09 13:00:45",
                    "updated_at": "2020-04-09 13:00:45"
                }
            ]
        }
    ]
	}
    */
    public function getTemplate()
    {
    	$role = Role::where('slug','admin')->first();
    
        $templatetype = TemplateType::with(['programgoal.goaltemplate'=>function($q) use($role){
            $q->whereIn('user_id',[$role->id,Auth::user()->id]);
            $q->with('day');
        }])->with(['programtemplate'=>function($q) use($role){
            $q->whereIn('user_id',[$role->id,Auth::user()->id]);
            $q->with('day');
        }])
        ->get();

        if($templatetype)
        {
            $multiplied = $templatetype->map(function ($item, $key) 
            {
                if($item->programgoal->isNotEmpty())
                {
                    unset($item->programtemplate);
                    $item->programtemplate = collect([]);
                    return $item;
                   
                }
                return $item;
            });
            return response()->json(['success'=>true, 'message'=>'Program Template Data Found successfully.', 'data'=>$multiplied->all()]);
        }else{
            return response()->json(['success'=>false, 'message'=>'Program Template Not Found.', 'data'=>[]]);
        }
    }

    /**
    * Program Template Type
    * @response {
        "success": true,
        "message": "Program Template Data Found successfully.",
        "data": [
        {
            "id": 1,
            "name": "Individual Templates",
            "created_at": null,
            "updated_at": null,
            "programgoal": [
                {
                    "id": 1,
                    "name": "Weight Loss",
                    "template_type_id": 1,
                    "created_at": null,
                    "updated_at": null
                },
                {
                    "id": 2,
                    "name": "Strength",
                    "template_type_id": 1,
                    "created_at": null,
                    "updated_at": null
                },
                {
                    "id": 3,
                    "name": "Muscle",
                    "template_type_id": 1,
                    "created_at": null,
                    "updated_at": null
                }
            ]
        },
        {
            "id": 2,
            "name": "SGPT Templates",
            "created_at": null,
            "updated_at": null,
            "programgoal": []
        },
        {
            "id": 3,
            "name": "Beast U Templates",
            "created_at": null,
            "updated_at": null,
            "programgoal": []
        }
    ]
    }
    */

    public function getTemplateType()
    {
        $templatetype = TemplateType::with('programgoal')->orderby('id','asc')->get();
        if($templatetype)
        {
            return response()->json(['success'=>true, 'message'=>'Program Template Data Found successfully.', 'data'=>$templatetype]);
        }else{
            return response()->json(['success'=>false, 'message'=>'Program Template Not Found.', 'data'=>[]]);
        }
    }

      /**
    * Program Template Type Create
    * @bodyParam template_type_id string required Main Template Type Id.
    * @bodyParam program_goal_id string Child Program Goal Id.
    * @bodyParam day_id string Day Id.
    * @bodyParam name string required Name.
    * @response {
        "success": true,
        "message": "Program Template added Successfully.",
        "data": {
            "user_id": 6,
            "template_type_id": "1",
            "program_goal_id": "1",
            "name": "test",
            "added_by": "coach",
            "updated_at": "2020-04-10 09:46:15",
            "created_at": "2020-04-10 09:46:15",
            "id": 3
        }
    }
    */

    public function createTemplate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'template_type_id'  =>'required',
            'name'              =>'required|min:3|unique:program_templates,name'
        
        ]);
        if ($validator->fails()) 
        {
            $errors = $validator->errors()->first();
            return response()->json(['success'=>false, 'message'=>$errors, 'data'=>[]]);
        }
        $user = Auth::user();
        $input = $request->all();
        $programtemplate = ProgramTemplate::create([
            'user_id'           => $user->id,
            'template_type_id'  => $input['template_type_id'],
            'program_goal_id'   => $request->has('program_goal_id') ? $input['program_goal_id'] : 0,
            'name'              => $input['name'],
            'day_id'            => $input['day_id'],
            'added_by'          => $user->roles[0]->slug,
        ]);

        if($programtemplate)
        {
            return response()->json(['success'=>true, 'message'=>'Program Template added Successfully.', 'data'=>$programtemplate]);
        }else{
            return response()->json(['success'=>false, 'message'=>'Program Template Not Added.', 'data'=>[]]);
        }
    }

    /**
    * Template Type Get by id
    * @response {
        "success": true,
        "message": "Program Template Data Found Successfully.",
        "data": {
            "user_id": 6,
            "template_type_id": "1",
            "program_goal_id": "1",
            "name": "test",
            "added_by": "coach",
            "updated_at": "2020-04-10 09:46:15",
            "created_at": "2020-04-10 09:46:15",
            "id": 3
        }
    }
    */

    public function editTemplate($id)
    {
        $programtemplate = ProgramTemplate::where('id',$id)->first();
        if($programtemplate)
        {
            return response()->json(['success'=>true, 'message'=>'Program Template Data Found Successfully.', 'data'=>$programtemplate]);
        }else{
            return response()->json(['success'=>false, 'message'=>'Program Template Not Found.', 'data'=>[]]);
        }
    }

    /**
    * Program Template Type Update
    * @bodyParam template_type_id string required Main Template Type Id.
    * @bodyParam program_goal_id string Child Program Goal Id.
    * @bodyParam name string required Name.
    * @bodyParam id integer required Id.
    * @response {
        "success": true,
        "message": "Program Template Update Successfully.",
        "data": {
            "user_id": 6,
            "template_type_id": "1",
            "program_goal_id": "1",
            "name": "test",
            "added_by": "coach",
            "updated_at": "2020-04-10 09:46:15",
            "created_at": "2020-04-10 09:46:15",
            "id": 3
        }
    }
    */

    public function updateTemplate(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id'                =>'required',
            'template_type_id'  =>'required',
            'name'              =>'required|min:3|unique:program_templates,name'
        
        ]);
        if ($validator->fails()) 
        {
            $errors = $validator->errors()->first();
            return response()->json(['success'=>false, 'message'=>$errors, 'data'=>[]]);
        }
        $input = $request->all();
        $programtemplate = ProgramTemplate::where('id',$input['id'])->first();
        

        if($programtemplate)
        {
            $programtemplate->update([
                'template_type_id'  => $input['template_type_id'],
                'program_goal_id'   => $request->has('program_goal_id') ? $input['program_goal_id'] : 0,
                'day_id'            => $input['day_id'],
                'name'              => $input['name'],
            ]);
            return response()->json(['success'=>true, 'message'=>'Program Template Updated Successfully.', 'data'=>$programtemplate]);
        }else{
            return response()->json(['success'=>false, 'message'=>'Program Template Not update.', 'data'=>[]]);
        }
    }

    /**
    * Template Type Deleted by id
    * @response {
        "success": true,
        "message": "Program Template Deleted Successfully."
    }
    */
    public function deleteTemplate($id)
    {
        $programtemplate = ProgramTemplate::where('id',$id)->first();
        if($programtemplate)
        {
            $programtemplate->delete();
            return response()->json(['success'=>true, 'message'=>'Program Template Deleted Successfully.']);
        }else{
            return response()->json(['success'=>false, 'message'=>'Program Template Not Found.']);
        }
    }


    /**
    * Program Template List
    * @bodyParam template_type_id string required Main Template Type.
    * @bodyParam program_goal_id string Program goal id under main template id.
    * @bodyParam day_id string Day Id.
    * @response {
        "success": true,
        "message": "Program Template list found.",
        "data": [
            {
                "id": 3,
                "name": "FLStrength2 Updated",
                "user_id": 1,
                "template_type_id": 1,
                "program_goal_id": 1,
                "status": 1,
                "added_by": "admin",
                "created_at": "2020-04-09 18:25:46",
                "updated_at": "2020-04-24 16:08:41"
            }
        ]
    }
    */
    public function programTemplateList(Request $request) {
        $validator = Validator::make($request->all(),[
            'template_type_id'=>'required',
            'day_id'          =>'nullable',
        ]);
        if ($validator->fails()) 
        {
            $errors = $validator->errors()->first();
            return response()->json(['success'=>false, 'message'=>$errors, 'data'=>[]]);
        }

        $input = $request->input();
        $role = Role::where('slug','admin')->first();
        if($input['template_type_id']) {
            $query = ProgramTemplate::where('template_type_id', $input['template_type_id'])->whereIn('user_id',[$role->id,Auth::user()->id]);
            if($input['program_goal_id']) {
                $query = $query->where('program_goal_id', $input['program_goal_id']);
            }
        }
        if($request->filled('day_id')){
            $query->where('day_id',$input['day_id']);
        }
        $data = $query->with('day')->orderBy('created_at','ASC')->get();
        
        if($data) 
        {
            return response()->json(['success'=>true, 'message'=>'Program Template list found.', 'data'=>$data]);
        } else {
            return response()->json(['success'=>false, 'message'=>'No data found.', 'data'=>[]]);
        }
    }
}
