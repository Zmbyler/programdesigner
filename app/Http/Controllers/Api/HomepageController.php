<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cms;
use App\Training;

/**
 * @group Homepage management
 *
 * APIs for managing Homepage
 */
class HomepageController extends Controller
{
	/**
    * Home Page Details
    * @response {
		"success": true,
	    "message": "Home Page Data Found successfully.",
	    "cms": [
	        {
	            "id": 4,
	            "title": "Get Started Today!",
	            "slug": "get-started-today",
	            "short_description": "Our 3 week trial is only $99 and includes: an individualized assessment with Coach Zack, a custom training program and unlimited sessions over a 3 week period, during the adult training time slots.",
	            "long_description": "Our 3 week trial is only $99 and includes: an individualized assessment with Coach Zack, a custom training program and unlimited sessions over a 3 week period, during the adult training time slots.",
	            "created_at": null,
	            "updated_at": null
	        },
	        {
	            "id": 1,
	            "title": "About Us",
	            "slug": "about-us",
	            "short_description": "<p>At BEST we are lifelong students of movement, nutrition, and strength and conditioning. BEST began training the first BESTies in 2012, and from the beginning, one of the driving passions behind opening BEST is the LONG TERM development of athletes and the general population.</p>",
	            "long_description": "At BEST we are lifelong students of movement, nutrition, and strength and conditioning. BEST began training the first BESTies in 2012, and from the beginning, one of the driving passions behind opening BEST is the LONG TERM development of athletes and the general population.",
	            "created_at": null,
	            "updated_at": "2020-04-08 09:44:50"
	        }
	    ],
	    "training": [
	        {
	            "id": 1,
	            "title": "BEAST UNIVERSITY //Youth Training",
	            "image": "20200408092837.jpg",
	            "short_description": "<p>Looking to get recruited at your favorite college, or just trying to excel in your middle school sport? For athletes ages 6 to 18, BEAST University could be the best solution for you. Classes are separated by age bracket and programs and individualized to your needs.</p>",
	            "long_description": "Looking to get recruited at your favorite college, or just trying to excel in your middle school sport? For athletes ages 6 to 18, BEAST University could be the best solution for you. Classes are separated by age bracket and programs and individualized to your needs.",
	            "created_at": null,
	            "updated_at": "2020-04-08 09:28:37"
	        },
	        {
	            "id": 2,
	            "title": "BEST FIT CAMP //Adult Training",
	            "image": "20200408092958.jpg",
	            "short_description": "<p>For adults of all ages, Coach Byler starts all program-designs off with a thorough assessment of your movement patterns, nutrition habits and more. This interval training, where we pay very close attention to detail and form, could be for you!</p>",
	            "long_description": "For adults of all ages, Coach Byler starts all program-designs off with a thorough assessment of your movement patterns, nutrition habits and more. This interval training, where we pay very close attention to detail and form, could be for you!",
	            "created_at": null,
	            "updated_at": "2020-04-08 09:29:58"
	        }
	    ]
	}
    */
    public function homePage(){
    	$cms = Cms::whereIn('slug',['about-us','get-started-today'])->orderby('id','desc')->get();
    	$training = Training::orderby('created_at','desc')->get();

    	if($cms && $training){
        	return response()->json(['success'=>true, 'message'=>'Home Page Data Found successfully.', 'cms'=>$cms,'training'=>$training]);
        }else{
        	return response()->json(['success'=>false, 'message'=>'Home Not Found.']);
        }
    }
}
