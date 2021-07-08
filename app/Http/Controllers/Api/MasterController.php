<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Country;
use App\BestDescription;
use App\BusinessDescription;
use App\AssessmentResult;
use App\AssessmentCategory;
use App\TemplateType;
use App\ProgramGoal;
use App\BlockFocus;
use App\AthleteProfile;
use App\Season;
use App\Sport;
use App\Days;
use App\Role;
use App\TrainingAge;
use App\ProgramTemplate;
use Auth;

/**
 * @group Master data management
 *
 * APIs for managing Master Data
 */
class MasterController extends Controller
{
	/**
    * Assessment Category List
    * @response {
	    "success": true,
	    "message": "Assessment Category List found.",
	    "data": [
	        {
	            "id": 1,
	            "name": "1",
	            "created_at": null,
	            "updated_at": null
	        }
	    ]
	}
    */

	public function assessmentCategory()
	{
		$assementcat = AssessmentCategory::select('id','name')->orderBy('created_at','ASC')->get();
		if($assementcat)
		{
			return response()->json(['success'=>true, 'message'=>'Assessment Category List found.', 'data'=>$assementcat]);
		}else{
			return response()->json(['success'=>false, 'message'=>'No data found.', 'data'=>[]]);
		}
	}
	/**
    * Days List
    * @response {
	    "success": true,
	    "message": "Days data found.",
	    "data": [
	        {
	            "id": 1,
	            "name": "1",
	            "created_at": null,
	            "updated_at": null
	        }
	    ]
	}
    */
    public function day()
    {
    	$days = Days::orderBy('created_at','ASC')->get();
    	if($days)
    	{
    		return response()->json(['success'=>true, 'message'=>'Days data found.', 'data'=>$days]);
    	}else{
    		return response()->json(['success'=>false, 'message'=>'No data found.', 'data'=>[]]);
    	}
    }

    /**
    * Country List
    * @response {
	    "success": true,
	    "message": "Country data found.",
	    "data": [
	        {
	            "id": 1,
	            "name": "Afghanistan",
	            "status": "1",
	            "created_at": null,
	            "updated_at": null
	        }
	    ]
	}
    */
    public function country()
    {
    	$country = Country::orderBy('created_at','ASC')->get();
    	if($country)
    	{
    		return response()->json(['success'=>true, 'message'=>'Country data found.', 'data'=>$country]);
    	}else{
    		return response()->json(['success'=>false, 'message'=>'No data found.', 'data'=>[]]);
    	}
    }

    /**
    * BestDescription List
    * @response {
	    "success": true,
	    "message": "Best Description data found.",
	    "data": [
	        {
	            "id": 1,
	            "name": "Personal Trainer/Fitness Professional",
	            "created_at": null,
	            "updated_at": null
	        }
	    ]
	}
    */

    public function bestDescription()
    {
    	$data = BestDescription::orderBy('created_at','ASC')->get();
    	if($data)
    	{
    		return response()->json(['success'=>true, 'message'=>'Best Description data found.', 'data'=>$data]);
    	}else{
    		return response()->json(['success'=>false, 'message'=>'No data found.', 'data'=>[]]);
    	}
    }

    /**
    * Business Description List
    * @response {
	    "success": true,
	    "message": "Business Description data found.",
	    "data": [
	        {
	            "id": 1,
	            "name": "Independent Fitness Professional",
	            "created_at": null,
	            "updated_at": null
	        }
	    ]
	}
    */

    public function businessDescription()
    {
    	$data = BusinessDescription::orderBy('created_at','ASC')->get();
    	if($data)
    	{
    		return response()->json(['success'=>true, 'message'=>'Business Description data found.', 'data'=>$data]);
    	}else{
    		return response()->json(['success'=>false, 'message'=>'No data found.', 'data'=>[]]);
    	}
	}

	/**
    * Block Focus List
    * @response {
	    "success": true,
	    "message": "Block Focus list found.",
	    "data": [
	        {
				"id": 1,
				"name": "Accumulation 1",
				"created_at": null,
				"updated_at": null
			},
			{
				"id": 2,
				"name": "Accumulation 2",
				"created_at": null,
				"updated_at": null
			},
			{
				"id": 3,
				"name": "Accumulation 3",
				"created_at": null,
				"updated_at": null
			},
			{
				"id": 4,
				"name": "Intensification 1",
				"created_at": null,
				"updated_at": null
			},
			{
				"id": 5,
				"name": "Intensification 2",
				"created_at": null,
				"updated_at": null
			},
			{
				"id": 6,
				"name": "Intensification 3",
				"created_at": null,
				"updated_at": null
			},
			{
				"id": 7,
				"name": "Realization 1",
				"created_at": null,
				"updated_at": null
			}
	    ]
	}
	*/
	public function blockFocusList() {
		$data = BlockFocus::orderBy('created_at','ASC')->get();
		if($data)
		{
    		return response()->json(['success'=>true, 'message'=>'Block Focus list found.', 'data'=>$data]);
    	} else {
    		return response()->json(['success'=>false, 'message'=>'No data found.', 'data'=>[]]);
    	}
	}

	/**
    * Athlete Profile List
    * @response {
	    "success": true,
	    "message": "Athlete Profile list found.",
	    "data": [
	        {
				"id": 1,
				"name": "Gorilla",
				"created_at": "2020-04-22 15:09:33",
				"updated_at": "2020-04-22 15:09:33"
			},
			{
				"id": 2,
				"name": "Kangaroo",
				"created_at": "2020-04-22 15:09:33",
				"updated_at": "2020-04-22 15:09:33"
			}
	    ]
	}
	*/
	public function athleteProfileList() {
		$data = AthleteProfile::orderBy('created_at','ASC')->get();
		if($data) 
		{
    		return response()->json(['success'=>true, 'message'=>'Athlete Profile list found.', 'data'=>$data]);
    	} else {
    		return response()->json(['success'=>false, 'message'=>'No data found.', 'data'=>[]]);
    	}
	}

	/**
    * Season List
    * @response {
	    "success": true,
	    "message": "Season list found.",
	    "data": [
	        {
				"id": 1,
				"name": "In-Season",
				"created_at": "2020-04-22 15:09:32",
				"updated_at": "2020-04-22 15:09:32"
			},
			{
				"id": 2,
				"name": "Off-Season",
				"created_at": "2020-04-22 15:09:33",
				"updated_at": "2020-04-22 15:09:33"
			},
			{
				"id": 3,
				"name": "Post-Season",
				"created_at": "2020-04-22 15:09:33",
				"updated_at": "2020-04-22 15:09:33"
			}
	    ]
	}
	*/
	public function seasonList() {
		$data = Season::orderBy('created_at','ASC')->get();
		if($data) 
		{
    		return response()->json(['success'=>true, 'message'=>'Season list found.', 'data'=>$data]);
    	} else {
    		return response()->json(['success'=>false, 'message'=>'No data found.', 'data'=>[]]);
    	}
	}

	/**
    * Sport List
    * @response {
	    "success": true,
	    "message": "Sport list found.",
	    "data": [
	        {
				"id": 1,
				"name": "Baseball",
				"created_at": "2020-04-22 15:09:33",
				"updated_at": "2020-04-22 15:09:33"
			},
			{
				"id": 2,
				"name": "Volleyball",
				"created_at": "2020-04-22 15:09:33",
				"updated_at": "2020-04-22 15:09:33"
			},
			{
				"id": 3,
				"name": "Basketball",
				"created_at": "2020-04-22 15:09:33",
				"updated_at": "2020-04-22 15:09:33"
			},
			{
				"id": 4,
				"name": "Swimming",
				"created_at": "2020-04-22 15:09:33",
				"updated_at": "2020-04-22 15:09:33"
			},
			{
				"id": 5,
				"name": "Tennis",
				"created_at": "2020-04-22 15:09:33",
				"updated_at": "2020-04-22 15:09:33"
			},
			{
				"id": 6,
				"name": "Soccer",
				"created_at": "2020-04-22 15:09:33",
				"updated_at": "2020-04-22 15:09:33"
			},
			{
				"id": 7,
				"name": "Hockey",
				"created_at": "2020-04-22 15:09:33",
				"updated_at": "2020-04-22 15:09:33"
			},
			{
				"id": 8,
				"name": "Football",
				"created_at": "2020-04-22 15:09:33",
				"updated_at": "2020-04-22 15:09:33"
			}
	    ]
	}
	*/
	public function sportList()
	{
		$data = Sport::orderBy('created_at','ASC')->get();
		if($data) {
    		return response()->json(['success'=>true, 'message'=>'Sport list found.', 'data'=>$data]);
    	} else {
    		return response()->json(['success'=>false, 'message'=>'No data found.', 'data'=>[]]);
    	}
	}

	/**
    * Training Age/Level List
    * @response {
	    "success": true,
	    "message": "Training Age list found.",
	    "data": [
	        {
				"id": 1,
				"name": "0",
				"created_at": "2020-04-22 15:09:33",
				"updated_at": "2020-04-22 15:09:33"
			},
			{
				"id": 2,
				"name": "1",
				"created_at": "2020-04-22 15:09:33",
				"updated_at": "2020-04-22 15:09:33"
			},
			{
				"id": 3,
				"name": "2",
				"created_at": "2020-04-22 15:09:33",
				"updated_at": "2020-04-22 15:09:33"
			},
			{
				"id": 4,
				"name": "3",
				"created_at": "2020-04-22 15:09:33",
				"updated_at": "2020-04-22 15:09:33"
			},
			{
				"id": 5,
				"name": "4",
				"created_at": "2020-04-22 15:09:33",
				"updated_at": "2020-04-22 15:09:33"
			}
	    ]
	}
	*/
	public function trainingAgeList() 
	{
		$data = TrainingAge::orderBy('created_at','ASC')->get();
		if($data) {
    		return response()->json(['success'=>true, 'message'=>'Training Age list found.', 'data'=>$data]);
    	} else {
    		return response()->json(['success'=>false, 'message'=>'No data found.', 'data'=>[]]);
    	}
	}

	/**
    * Program Goal List
    * @response {
	    "success": true,
	    "message": "Program Goal list found.",
	    "data": [
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
	}
	*/
	public function programGoalList()
	{
		$data = ProgramGoal::orderBy('created_at','ASC')->get();
		if($data) {
    		return response()->json(['success'=>true, 'message'=>'Program Goal list found.', 'data'=>$data]);
    	} else {
    		return response()->json(['success'=>false, 'message'=>'No data found.', 'data'=>[]]);
    	}
	}
}
