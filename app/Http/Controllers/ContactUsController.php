<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Helpers\APIHelpers;
use App\Setting;

class ContactUsController extends Controller
{   
    // get contact details
    public function GetContact(){
        $data = Setting::select('address_ar as address' , 'latitude' , 'longitude' , 'app_phone')->find(1);
        $response = APIHelpers::createApiResponse(false , 200 ,  '' , $data);
        return response()->json($response , 200);
    }
}