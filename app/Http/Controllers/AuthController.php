<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Helpers\APIHelpers;
use App\Http\Controllers\Controller;
use App\User;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login' , 'register' , 'invalid']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {

        $credentials = request(['phone', 'password']);

        if(! $request->fcm_token){
            $response = APIHelpers::createApiResponse(true , 406  , 'بعض الحقول مفقودة' , null);
            return response()->json($response , 406);
        }

        if (! $token = auth()->attempt($credentials)) {
            $response  = APIHelpers::createApiResponse(true , 401  , 'يرجي التاكد من رقم الهاتف او كلمة المرور' , null);
            return response()->json($response, 401);
        }

        $user = auth()->user();

        if($user->active == 0){
            $response = APIHelpers::createApiResponse(true , 406  , 'تم حظر حسابك من الادمن' , null);
            return response()->json($response , 406);
        }

        $user->fcm_token = $request->fcm_token;
        $user->save();
        
        $responsewithtoken = $this->respondWithToken($token);

        $response = APIHelpers::createApiResponse(false , 200 ,  '' , $responsewithtoken);
        return response()->json($response , 200);
    }


    public function invalid(){
        
        $response = APIHelpers::createApiResponse(true , 401 ,  'تم تسجيل الخروج' , null);
        return response()->json($response , 401);
    }

    /* 
    * create user 
    */
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            "password" => 'required',
			"email" => "required",
            "fcm_token" => 'required',
        ]);

        if ($validator->fails()) {
            $response = APIHelpers::createApiResponse(true , 406 ,  'بعض الحقول مفقودة' , null);
            return response()->json($response , 406);
        }

        // check if phone number register before
        $prev_user_phone = User::where('phone', $request->phone)->first();
        if($prev_user_phone){
            $response = APIHelpers::createApiResponse(true , 409 , 'رقم الهاتف موجود من قبل' , null);
            return response()->json($response , 409);
        }

		        // check if email register before
         $prev_user_email = User::where('email', $request->email)->first();
        if($prev_user_email){
            $response = APIHelpers::createApiResponse(true , 409 , 'البريد الالكتروني مستخدم بالفعل' , null);
            return response()->json($response , 409);
        }


        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
		$user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->fcm_token = $request->fcm_token;
        $user->save();

        $token = auth()->login($user);
        $user->token = $this->respondWithToken($token);
        $data = $user;
        $response = APIHelpers::createApiResponse(false , 200 ,  '' , $data);
        return response()->json($response , 200);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $user = auth()->user();
        if($user->active == 0){
            $response = APIHelpers::createApiResponse(true , 406  , 'تم حظر حسابك من الادمن' , null);
            return response()->json($response , 406);
        }
        $data = $user;
        $response = APIHelpers::createApiResponse(false , 200 ,  '' , $data);
        return response()->json($response , 200);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        $response = APIHelpers::createApiResponse(false , 200 ,  '' , []);
        return response()->json($response , 200);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        $responsewithtoken = $this->respondWithToken(auth()->refresh());
        $response = APIHelpers::createApiResponse(false , 200 ,  '' , $responsewithtoken);
        return response()->json($response , 200);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 432000
        ];
    }
}