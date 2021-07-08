<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Plan;
/**
 * @group Plan management
 *
 * APIs for managing Plans
 */
class PlanController extends Controller
{   
	/**
    * Plan List
    * @response {
	    "success": true,
	    "message": "Plans fetched successfully.",
	    "data": [
	        {
	            "id": 1,
	            "name": "Basic Plan",
	            "no_of_user": 10,
	            "price": "10",
	            "status": 1,
	            "created_at": "2020-04-02 12:53:09",
	            "updated_at": "2020-04-02 12:53:09"
	        }
	    ]
	}
    */
    public function index()
    {
		$plans = Plan::orderBy('price','ASC')->where('status',1)->get();
    	if(isset($plans))
    	{
    		return response()->json(['success'=>true, 'message'=>'Plans fetched successfully.', 'data'=>$plans]);
    	}else{
    		return response()->json(['success'=>false, 'message'=>'No data found.', 'data'=>[]]);
    	}
    }
}
