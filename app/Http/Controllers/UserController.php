<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Helpers\APIHelpers;
use App\UserNotification;
use App\Notification;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api' , ['except' => ['resetforgettenpassword' , 'checkphoneexistance']]);
    }

    public function getprofile(Request $request){
        $user = auth()->user();
        if($user->active == 0){
            $response = APIHelpers::createApiResponse(true , 406  , 'تم حظر حسابك من الادمن' , null);
            return response()->json($response , 406);
        }
        $returned_user['name'] = $user['name'];
        $returned_user['phone'] = $user['phone'];
        $returned_user['email'] = $user['email'];
        $data = $returned_user;
        $response = APIHelpers::createApiResponse(false , 200 , '' , $data);
        return response()->json($response , 200);  
    }

    public function updateprofile(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            "email" => 'required',
        ]);

        if ($validator->fails()) {
            $response = APIHelpers::createApiResponse(true , 406 ,  'بعض الحقول مفقودة' , null);
            return response()->json($response , 406);
        }

        $currentuser = auth()->user();
        if($currentuser->active == 0){
            $response = APIHelpers::createApiResponse(true , 406  , 'تم حظر حسابك من الادمن' , null);
            return response()->json($response , 406);
        }

        $user_by_email = User::where('email' , '!=' ,$currentuser->email)->where('email' , $request->email)->first();
        if($user_by_email){
            $response = APIHelpers::createApiResponse(true , 409 ,  'البريد الإلكتروني موجود من قبل' , null);
            return response()->json($response , 409); 
        }

        User::where('id' , $currentuser->id)->update([
            'name' => $request->name , 
            'email' => $request->email ]);

        $newuser = User::select('id','name' , 'phone' , 'email')->find($currentuser->id);
        $data = $newuser;
        $response = APIHelpers::createApiResponse(false , 200 ,  '' , $data);
        return response()->json($response , 200);    
    }


    public function resetpassword(Request $request){
        $validator = Validator::make($request->all() , [
            'password' => 'required',
			"old_password" => 'required'
        ]);

        if($validator->fails()) {
            $response = APIHelpers::createApiResponse(true , 406 ,  'بعض الحقول مفقودة' , null);
            return response()->json($response , 406);
        }

        $user = auth()->user();
		
		if(!Hash::check($request->old_password, $user->password)){
			$response = APIHelpers::createApiResponse(true , 406 , 'Wrong old password' , 'كلمه المرور السابقه خطأ' , null , $request->lang);
            return response()->json($response , 406);
		}
		if($request->old_password == $request->password){
			$response = APIHelpers::createApiResponse(true , 406 , 'You cannot set the same previous password' , 'لا يمكنك تعيين نفس كلمه المرور السابقه' , null , $request->lang);
            return response()->json($response , 406);
		}
		
        if($user->active == 0){
            $response = APIHelpers::createApiResponse(true , 406  , 'تم حظر حسابك من الادمن' , null);
            return response()->json($response , 406);
        }
        User::where('id' , $user->id)->update(['password' => Hash::make($request->password)]);
        $newuser = User::select('id' , 'name' , 'phone' , 'email')->find($user->id);
        $data = $newuser;
		
		$token = auth()->login($data);
        $data->token = $this->respondWithToken($token);
		
        $response = APIHelpers::createApiResponse(false , 200 ,  '' , $data);
        return response()->json($response , 200);
    }

    public function resetforgettenpassword(Request $request){
        $validator = Validator::make($request->all() , [
            'password' => 'required',
            'phone' => 'required'
        ]);

        if($validator->fails()) {
            $response = APIHelpers::createApiResponse(true , 406 ,  'بعض الحقول مفقودة' , null);
            return response()->json($response , 406);
        }

        $user = User::where('phone', $request->phone)->first();
        if(! $user){
            $response = APIHelpers::createApiResponse(true , 403 , 'رقم الهاتف غير موجود' , null);
            return response()->json($response , 403);
        }

        User::where('phone' , $user->phone)->update(['password' => Hash::make($request->password)]);
        $newuser = User::where('phone' , $user->phone)->select('id' , 'name' , 'phone' , 'email')->first();
        $data = $newuser;
		
		$token = auth()->login($data);
        $data->token = $this->respondWithToken($token);
		
        $response = APIHelpers::createApiResponse(false , 200 ,  '' , $data);
        return response()->json($response , 200);
    }

    // check if phone exists before or not
    public function checkphoneexistance(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'phone' => 'required'
        ]);

        if($validator->fails()) {
            $response = APIHelpers::createApiResponse(true , 406 , 'حقل الهاتف اجباري' , null);
            return response()->json($response , 406);
        }
		 if($request->email){
            $data_email = User::where('email' , $request->email)->select('id' , 'name' , 'phone' , 'email')->first();
			 $data_phone = User::where('phone' , $request->phone)->select('id' , 'name' , 'phone' , 'email')->first();
            if(!$data_email && !$data_phone ){
                $response = APIHelpers::createApiResponse(true , 403 ,  'البريد الإلكتروني و الهاتف غير موجود من قبل' , null);
                return response()->json($response , 403);
            }
			if($data_email){
				 $response = APIHelpers::createApiResponse(false , 200 ,  '' , $data_email);
            return response()->json($response , 200);
			}	 
        }
        
        $data = User::where('phone' , $request->phone)->select('id' , 'name' , 'phone' , 'email')->first();
        
        if($data){
            $response = APIHelpers::createApiResponse(false , 200 ,  '' , $data);
            return response()->json($response , 200);
        }
		
		

        $response = APIHelpers::createApiResponse(true , 403 ,  'الهاتف غير موجود من قبل' , null);
        return response()->json($response , 403);

    }

    // get notifications
    public function notifications(){
        $user = auth()->user();
        if($user->active == 0){
            $response = APIHelpers::createApiResponse(true , 406  , 'تم حظر حسابك من الادمن' , null);
            return response()->json($response , 406);
        }

        $user_id = $user->id;
        $notifications_ids = UserNotification::where('user_id' , $user_id)->orderBy('id' , 'desc')->select('notification_id')->get();
        $notifications = [];
        for($i = 0; $i < count($notifications_ids); $i++){
            $notifications[$i] = Notification::select('id','title' , 'body' ,'image')->find($notifications_ids[$i]['notification_id']);
        }
        $data['notifications'] = $notifications;
        $response = APIHelpers::createApiResponse(false , 200 ,  '' , $data);
        return response()->json($response , 200);  
    }
	
	protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 432000
        ];
    }


}
