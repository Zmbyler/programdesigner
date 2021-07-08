<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\ForgotPassword;
use App\User;
use App\Card;
use App\Role;
use App\UserRole;
use App\UserSubcription;
use App\UserDetails;
use Cartalyst\Stripe\Stripe;
use Auth,Hash,Mail,Validator,Password;

/**
 * @group User management
 *
 * APIs for managing User
 */
class AuthController extends Controller
{	
	  /**
     * Register
     * @bodyParam email string required Email.
     * @bodyParam password string required Password.
     * @bodyParam business_name string required Business Name.
     * @bodyParam step string required Step.
     * @bodyParam role string required Role.
     *  @response {
		    "success": true,
		    "message": "User register successfully.",
		    "data": {
		        "email": "user@gmail.com",
            "password": "123456",
            "business_name": "test",
            "step": 1,
		        "updated_at": "2020-04-01 10:56:58",
		        "created_at": "2020-04-01 10:56:58",
		        "id": 6
		    }
		}
		*/
    public function store(Request $request){

      $validator = Validator::make($request->all(),[
        'email'=>'required|email|unique:users',
        'password'=>'required|min:8',
        'business_name'=>'required',
        'step' =>'required|integer'
        
      ]);
      if ($validator->fails()) 
      {
          $errors = $validator->errors()->first();
          return response()->json(['success'=>false, 'message'=>$errors, 'data'=>[]]);
      }

      $input = $request->all();
    	$user = User::where('email',$input['email'])->first();
    	if($user)
      {
    		return response()->json(['success'=>false, 'message'=>'Email already exists.', 'data'=>[]]);
    	}else{
          $role = Role::where('slug',$input['role'])->first();
          $input['password'] = bcrypt($input['password']);
          $data = User::create([
            'email'=>$input['email'],
            'password'=>$input['password'],
            'business_name'=>$input['business_name'],
            'step'=>$input['step'],
          ]);
          if($data){
            UserRole::create([
              'role_id'=>$role['id'],
              'user_id'=>$data['id']
            ]);
            UserDetails::create([
              'user_id'=>$data['id']
            ]);

            $token =  $data->createToken('fitness')->accessToken; 
            $data->role = $input['role'];
          }
        return response()->json(['success'=>true, 'message'=>'User register successfully.', 'data'=>$data,'token'=>$token]);

    	}
    }


    /**
     * Login
     * @bodyParam email string required Email.
     * @bodyParam password string required Password.
     * @response {
		    "success": true,
		    "message": "You have successfully logged in.",
		    "data": {
		        "id": 6,
		        "first_name": "User",
		        "last_name": "api",
		        "email": "user@gmail.com",
		        "status": 1,
		        "email_verified_at": null,
		        "business_name": null,
		        "created_at": "2020-04-01 10:56:58",
		        "updated_at": "2020-04-01 10:56:58",
            "role": "coach"
		    },
		    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZTI1N2U5NTczNzY3NWI5MmFjYjY2YjZmY2Y1MmFlZWViZTRhZTA0NDk0Yjg3Yjg4MjYxMzYxMDZkY2U5NTQ1YzY0Njg4OTYxNWVkMzdmZTEiLCJpYXQiOjE1ODU3Mzg4ODQsIm5iZiI6MTU4NTczODg4NCwiZXhwIjoxNjE3Mjc0ODgzLCJzdWIiOiI2Iiwic2NvcGVzIjpbXX0.pcQEFY-E_Ydwa9jJux70PqOomzs7YE_cbBOGe-f0HoSswrjpDx-cuoUrw7TsqM_FA9B85DkGSOBO0PWUG0-Vzg0YA8kuP6Ie5QMg6KEkibPHYqVmJgtAucLtqFJVTfa4_qc6ps8WlX3v2Zg05MlMtiYH3yO6EUkmKlIYh-42Xg3vT8hWCpx76WTVrOIA1ZWc3ubsRNJ12yCRD5LXBzMZpjrGmf0Xwoaqoned9liZJiZlfUnyp17-bmXwGvHrHhGq4lOOJehLeWdh2mdvp4pGKGQIYe0VHevI08xbiADMBxHIeiVk_n7JN5brcGnZZD8dGS0JOEO-LmBhu7C2-on1xDC84uaSzontyOEEYb0fS9pHT_DOGS7E0bEgTcnQsz1efnZjoPs8opYir9DLx1pNfYQKqrE3kjqxMMTa4zp1U0rpoJKyU9ujV1OTxiP_mZLjaen7baY0dMD8BZQJUMBrEVgs5nKfrfRRC1bA1IgMotwqgonbsmwRYnHO_ipKPAxxRi5SESe1MTbfTp-Lg-kZIGto0ENOGEy5SFK_OXdjLXcxImDOsKDa3nIQa4qVMra9fR47srDLYWKiA2qdaxaAE6k5vH6ranHrsXE7yxnurZng7sAzGHRx8VsDUF9LoIb7o9pAE_ld50u4pYDUUD02CF9Fm5J3zWn1AnSkVUtQUMg"
		}
		    
     */
    public function login(Request $request)
    {
    	$input = $request->all();
    	$user = User::where('email',$input['email'])->first();
    	if($user){
    		if(Hash::check($input['password'], $user->password)){
    			//auth check with email and password
    			if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user->role = Auth::user()->roles[0]->slug;
              $token =  $user->createToken('fitness')->accessToken; 
              return response()->json(['success'=>true, 'message'=>'You have successfully logged in.', 'data'=>$user,'token'=>$token]);
		        }else{
		            return response()->json(['success'=>false, 'message'=>'Unauthorised.', 'data'=>[]]);
		        }
    		}else{
                 return response()->json(['success'=>false, 'message'=>'Authentication failed, Wrong Password', 'data'=>[]]);
    		}
    	}else{
    		return response()->json(['success'=>false, 'message'=>'Authentication failed, Wrong Email', 'data'=>[]]);
    	}
    }

    /**
     * Profile
     * @response {
	    "success": true,
	    "message": "Profile fetched successfully.",
	    "data": {
	        "id": 6,
	        "first_name": "User",
	        "last_name": "api",
	        "email": "user@gmail.com",
	        "status": 1,
	        "email_verified_at": null,
	        "business_name": null,
	        "created_at": "2020-04-01 10:56:58",
	        "updated_at": "2020-04-01 10:56:58"
	    }
	}
		    
     */
    public function profile(){
        $user = Auth::user();
        if($user){
        	return response()->json(['success'=>true, 'message'=>'Profile fetched successfully.', 'data'=>$user]);
        }else{
        	return response()->json(['success'=>false, 'message'=>'No data found.', 'data'=>[]]);
        }
    }

    /**
    * Change Password
    * @bodyParam old_password string required old_password.
    * @bodyParam new_password string required new_password.
    * @bodyParam confirm_new_password string required confirm_new_password.
    * @response {
        "success": true,
        "message": "Password changed successfully.",
        "data": {
          "id": 6,
          "first_name": "User",
          "last_name": "api",
          "email": "user@gmail.com",
          "status": 1,
          "email_verified_at": null,
          "business_name": null,
          "created_at": "2020-04-01 10:56:58",
          "updated_at": "2020-04-01 10:56:58"
        }
    }
    */

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(),[
          'old_password'=>'required|min:6',
          'new_password'=>'required|min:6',
          'confirm_new_password'=>'required|min:6',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->first();
            return response()->json(['success'=>false, 'message'=>$errors, 'data'=>[]]);
        }
        $input = $request->all();
        if($input['new_password']==$input['confirm_new_password']){
            $user = Auth::user();
            if($user){
                if(!Hash::check($input['old_password'], $user->password)){

                    return response()->json(['success'=>false, 'message'=>'Old password doesnot match.', 'data'=>[]]);

                }else{

                    $user->update([
                        'password'=>bcrypt($input['new_password'])             
                    ]);
                    return response()->json(['success'=>true, 'message'=>'Password changed successfully.', 'data'=>$user]);
                }
            }else{
              return response()->json(['success'=>false, 'message'=>'User Not Found.', 'data'=>[]]);
            }

        }else{
            return response()->json(['success'=>false, 'message'=>'New password and confirm new pasword should match.', 'data'=>[]]);
        }
    }

    /**
     * Profile Update
     * @bodyParam first_name string required First Name.
     * @bodyParam last_name string required Last Name.
     * @bodyParam email string required Email.
     * @bodyParam business_name string required Business Name.
     * @bodyParam country_id string required Conuntry Id.
     * @bodyParam city string required City.
     * @bodyParam time_zone string required Time Zone.
     * @bodyParam business_descriptions_id string required Business description Id.
     * @bodyParam business_phoneno string required Business Phoneno.
     * @bodyParam business_other_details string required Business other details.
     * @bodyParam best_descriptions_id string required Best descriptions id.
     * @bodyParam best_other_details string required Best other details.
     * @bodyParam step string required Step.
     * @bodyParam profile_image string required Profile Image.
     * @response {
        "success": true,
        "message": "User updated successfully.",
        "data": [
        {
            "id": 3,
            "first_name": null,
            "last_name": null,
            "email": "payal@gmail3.com",
            "status": 1,
            "email_verified_at": null,
            "business_name": "test",
            "profile_image":"77666883.jpg"
            "step": 2,
            "created_at": "2020-04-07 05:38:15",
            "updated_at": "2020-04-07 05:52:21",
            "userdetails": {
                "id": 2,
                "user_id": 3,
                "country_id": 0,
                "city": null,
                "time_zone": "utc+5:30",
                "business_descriptions_id": 6,
                "business_phoneno": "6767676767",
                "business_other_details": "test",
                "best_descriptions_id": 6,
                "best_other_details": "gggdggd",
                "created_at": "2020-04-07 05:38:16",
                "updated_at": "2020-04-07 05:55:51"
            }
        }
    ]
        }
            
     */

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(),[
            'first_name'=>'nullable|string',
            'last_name'=>'nullable|string',
            'email'=>'email|unique:users,email,'.$user->id,
            'business_name'=>'nullable|string',
            'profile_image'=>'mimes:jpeg,png,jpg,gif,svg'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->first();
            return response()->json(['success'=>false, 'message'=>$errors, 'data'=>[]]);
        }
        if($user){
          $input = $request->all();
          if($input['step'] == 2){
            $user->update([
             'step' => 2,
            ]);

            UserDetails::where('user_id', $user->id)->update([
              'time_zone' =>$input['time_zone'],
              'business_descriptions_id' =>$input['business_descriptions_id'],
              'business_phoneno' =>$request->has('business_phoneno') ? $input['business_phoneno'] : '',
              'business_other_details' =>$request->has('business_other_details') ? $input['business_other_details'] : '',
              'best_descriptions_id' =>$input['best_descriptions_id'],
              'best_other_details' =>$request->has('best_other_details') ? $input['best_other_details'] : '',
            ]);

          }elseif($input['step'] == 3){
            if($request->profile_image){
              $files = $request->profile_image;
              $destinationPath = public_path('/uploads/profile_image/');
              $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
              $files->move($destinationPath, $profileImage);
            }else{
              $profileImage = $user->profile_image ? $user->profile_image : '';
            }

            $user->update([
              'first_name' => $input['first_name'],
              'last_name' => $input['last_name'],
              'profile_image' => $profileImage,
              'step' => 3,
            ]);

            UserDetails::where('user_id', $user->id)->update([
              'country_id'=>$input['country_id'],
              'city'      =>$input['city'],
              
            ]);
          }else{
            if($request->has('profile_image')){
              $files = $request->profile_image;
              $destinationPath = public_path('/uploads/profile_image/');
              $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
              $files->move($destinationPath, $profileImage);
            }else{
              $profileImage = $user->profile_image ? $user->profile_image : '';
            }
            $user->update([
              'first_name' => $input['first_name'],
              'last_name' => $input['last_name'],
              'email' => $input['email'],
              'business_name' => $input['business_name'],
              'profile_image' => $profileImage,
            ]);
            UserDetails::where('user_id', $user->id)->update([
              'country_id'=>$input['country_id'] ? $input['country_id'] : 0,
              'city'      =>$input['city'],
              'time_zone' =>$input['time_zone'],
              'business_descriptions_id' =>$input['business_descriptions_id'],
              'business_phoneno' =>$input['business_phoneno'],
              'business_other_details' =>$input['business_other_details'],
              'best_descriptions_id' =>$input['best_descriptions_id'],
              'best_other_details' =>$input['best_other_details'],
            ]);
          }
          
          
          $userdata = User::where('id',$user->id)->with('userdetails')->first();
          return response()->json(['success'=>true, 'message'=>'User updated successfully.', 'data'=>$userdata]);
        }else{
          return response()->json(['success'=>false, 'message'=>'User not found', 'data'=>[]]); 
        }
    }

    /**
    * Forgot Password
    * @bodyParam email string required Email.
    * @response {
        "success": true,
        "message": "Mail Send Successfully.",
    }
            
     */

    public function forgotPassword(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'email'=>'required|email',
      ]);
      if ($validator->fails()) {
          $errors = $validator->errors()->first();
          return response()->json(['success'=>false, 'message'=>$errors]);
      }

      $input = $request->all();
      $user = User::where('email',$input['email'])->first();
      if($user){
        $token = Password::broker()->createToken($user);
        $user->notify(new ForgotPassword($token));
        return response()->json(['success'=>true, 'message'=>'Mail Send Successfully.']);
      }else{
        return response()->json(['success'=>false, 'message'=>'user Not Found.']);
      }
    }

    /**
     * Logout user (Revoke the token)
     * @response {
        "success": true,
	      "message": "Successfully logged out",
	      "data": []
	    }
	  }
     * @return [string] message
    */
    public function logout(Request $request) {
      $request->user()->token()->revoke();
      return response()->json(['success'=>true, 'message'=>'Successfully logged out', 'data'=>[]]);
    }
       
}
