<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use App\ContactusPage;
use App\Role;
use App\User;
use App\Notifications\ContactUs;
use Notification,Validator;

/**
 * @group Contact us management
 *
 * APIs for managing Contact
 */
class ContactController extends Controller
{
	/**
    * Contact Details
    * @bodyParam name string required Name.
    * @bodyParam email string required Email.
    * @bodyParam query string required Query.
    * @bodyParam message string required Message.
    * @response {
		"success": true,
		"message": "Contact Data Found successfully.",
		"data": {
	        "name": "payal",
	        "email": "payal@gmail.com",
	        "query": "test",
	        "message": "test",
	        "updated_at": "2020-04-13 12:10:05",
	        "created_at": "2020-04-13 12:10:05",
	        "id": 1
	    }
	}
    */
    public function contactUs(Request $request)
    {
    	$validator = Validator::make($request->all(),[
            'name'=>'required',
           	'email'=>'required',
           	'query'=>'required',
           	'message'=>'required',
        
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->first();
            return response()->json(['success'=>false, 'message'=>$errors, 'data'=>[]]);
        }
        $input = $request->all();
        $contact = Contact::create($input);
        $role = Role::where('slug','admin')->first();
        $user = User::where('id',$role->id)->first();
        if($contact){
        	return response()->json(['success'=>true, 'message'=>'Contact data added Successfully.', 'data'=>$contact]);
        	Notification::send($user, new ContactUs($contact));
        }else{
        	return response()->json(['success'=>false, 'message'=>'Contact data Not Added.', 'data'=>[]]);
        }
    }

    /**
    * Contact Page data
    * @response {
        "success": true,
        "message": "Contact Data Found successfully.",
        "data": {
        "id": 1,
        "name": "Contact Us",
        "address": "4248 North River Rd. NE Warren, Ohio",
        "email": "info@bylerelitestrength.com",
        "phone": "330-989-0022",
        "short_description": "Our 3 week trial is only $99 and includes: an individualized assessment with Coach Zack, a custom training program and unlimited sessions over a 3 week period, during the adult training time slots.",
        "long_description": "Our 3 week trial is only $99 and includes: an individualized assessment with Coach Zack, a custom training program and unlimited sessions over a 3 week period, during the adult training time slots.",
        "created_at": null,
        "updated_at": null
    }
    }
    */

    public function getcontactPage(){
        $contactpage = ContactusPage::first();
        if($contactpage){
            return response()->json(['success'=>true, 'message'=>'Contact data added Successfully.', 'data'=>$contactpage]);
        }else{
            return response()->json(['success'=>false, 'message'=>'Contact data Not Added.', 'data'=>[]]);
        }
    }
}
