<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cms;


/**
 * @group CMS management
 *
 * APIs for managing CMS
 */
class CmsController extends Controller
{
	/**
    * CMS Details
    * @bodyParam slug string required slug ['about-us'].
    * @response {
		"success": true,
		"message": "Cms Page Data Found successfully.",
		"data": {
		    "id": 3,
		    "title": "Contact us",
		    "slug": "contact-us",
		    "short_description": "This is test Contact us",
		    "long_description": "This is test Contact us",
		    "created_at": null,
		    "updated_at": null
		}
	}
    */
    public function cms($slug)
    {
      
        $cms = Cms::where('slug',$slug)->first();
        if($cms){
        	return response()->json(['success'=>true, 'message'=>'Cms Page Data Found successfully.', 'data'=>$cms]);
        }else{
        	return response()->json(['success'=>false, 'message'=>'Cms Not Found.', 'data'=>[]]);
        }
    }
}
