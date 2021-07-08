<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AssessmentResult;
use App\AssessmentCategory;
use App\Role;
use Auth,Validator;

/**
 * @group Assessment management
 *
 * APIs for managing Assessment
 */
class AssessmentController extends Controller
{

    
    /**
     * Assessment Details
     * @response {
		"success": true,
	    "message": "Assessment Data Found successfully.",
	    "data": [
            {
                "id": 24,
                "name": "Toe Touch",
                "status": 1,
                "created_at": "2020-05-06 06:08:20",
                "updated_at": "2020-05-06 06:08:20"
            },
            {
                "id": 23,
                "name": "Toe Touch To Squat",
                "status": 1,
                "created_at": "2020-05-06 06:08:05",
                "updated_at": "2020-05-06 06:08:05"
            },
            {
                "id": 22,
                "name": "Supine Hip Flexion - Left Hip",
                "status": 1,
                "created_at": "2020-05-06 06:07:33",
                "updated_at": "2020-05-06 06:07:33"
            },
        ]
	}
     */
    public function assessment()
    {
        $role = Role::where('slug','admin')->first();
        $assessmentresult = AssessmentResult::where('user_id',$role->id)
            ->orWhere('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')->get();
        if ($assessmentresult) {
            return response()->json(['success' => true, 'message' => 'Assessment Data Found successfully.', 'data' => $assessmentresult]);
        } else {
            return response()->json(['success' => false, 'message' => 'Assessment Not Found.', 'data' => []]);
        }
    }
    /**
     * Add New Assessment
     * @bodyParam name string required Email.
     * @response {
		"success": true,
	    "message": "Assessment Data Found successfully.",
        "data": [
            {
                "id": 28,
                "name": "test12",
                "user_id": 25,
                "status": 1,
                "created_at": "2020-07-28 10:25:25",
                "updated_at": "2020-07-28 10:25:25"
            },
            {
                "id": 24,
                "name": "Toe Touch",
                "user_id": null,
                "status": 1,
                "created_at": "2020-05-06 06:08:20",
                "updated_at": "2020-05-06 06:08:20"
            },
            {
                "id": 23,
                "name": "Toe Touch To Squat",
                "user_id": null,
                "status": 1,
                "created_at": "2020-05-06 06:08:05",
                "updated_at": "2020-05-06 06:08:05"
            },
            {
                "id": 22,
                "name": "Supine Hip Flexion - Left Hip",
                "user_id": null,
                "status": 1,
                "created_at": "2020-05-06 06:07:33",
                "updated_at": "2020-05-06 06:07:33"
            }
        ]
	}

     */
    public function addAssessment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:program_templates,name',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->first();
            return response()->json(['success' => false, 'message' => $errors, 'data' => []]);
        }
        $input                          = $request->all();
        $input['user_id']               = Auth::user()->id;
        $input['assessment_option_one'] = 'Pass';
        $input['assessment_option_two'] = 'Fail';
        $assessmentResult = AssessmentResult::create($input);
        if ($assessmentResult) {
            return $this->assessment();
        } else {
            return response()->json(['success' => false, 'message' => 'Assessment Not Found.', 'data' => []]);
        }
    }


    /**
     * Assessment Result Details
     * @response {
        "success": true,
        "message": "Assessment Data Found successfully.",
        "data": [
             {
            "id": 24,
            "name": "Toe Touch",
            "user_id": 1,
            "status": 1,
            "slug": "toe_touch",
            "assessment_option_one": "Pass",
            "assessment_option_two": "Fail",
            "created_at": "2020-05-06 06:08:20",
            "updated_at": "2020-08-26 10:04:17"
        },
        {
            "id": 23,
            "name": "Toe Touch To Squat",
            "user_id": 1,
            "status": 1,
            "slug": "toe_touch_to_squat",
            "assessment_option_one": "Pass",
            "assessment_option_two": "Fail",
            "created_at": "2020-05-06 06:08:05",
            "updated_at": "2020-08-26 10:05:20"
        },
        {
            "id": 22,
            "name": "Supine Hip Flexion - Left Hip",
            "user_id": 1,
            "status": 1,
            "slug": "supine_hip_flexion_left_hip",
            "assessment_option_one": "Pass",
            "assessment_option_two": "Fail",
            "created_at": "2020-05-06 06:07:33",
            "updated_at": "2020-08-26 10:05:30"
        }
        ]
    }
     */
    public function assessmentResult()
    {
        $role = Role::where('slug','admin')->first();
        $assessmentresult = AssessmentResult::where('user_id',$role->id)
            ->orWhere('user_id', Auth::user()->id)
            ->orderBy('id', 'desc')->get();
        if ($assessmentresult) {
            return response()->json(['success' => true, 'message' => 'Assessment Data Found successfully.', 'data' => $assessmentresult]);
        } else {
            return response()->json(['success' => false, 'message' => 'Assessment Not Found.', 'data' => []]);
        }
    }
}
