<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\APIHelpers;
use App\Ad;
use App\Service;
use App\News;
use App\Count;

class HomeController extends Controller
{
    // get home ads
    public function GetAds(){
        $data['ads'] = Ad::orderBy('id' , 'desc')->select('id' , 'type' , 'image' , 'content')->get();
        $response = APIHelpers::createApiResponse(false , 200 ,  '' , $data);
        return response()->json($response , 200);
    }

    // get home screen data
    public function GetHome(){
        $data['services'] = Service::orderBy('id' , 'desc')->select('id' , 'title' , 'image' , 'small_description as description')->offset(0)->limit(4)->get();
        $data['news'] = News::orderBy('id' , 'desc')->select('id' , 'title' , 'image' , 'small_description as description' , 'created_at')->offset(0)->limit(2)->get();
        $data['counts'] = Count::select('user' , 'service' , 'family' , 'initiative')->find(1);
        $response = APIHelpers::createApiResponse(false , 200 ,  '' , $data);
        return response()->json($response , 200);        
    }

}