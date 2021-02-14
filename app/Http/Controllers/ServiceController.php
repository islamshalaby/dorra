<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Helpers\APIHelpers;
use App\Service;

class ServiceController extends Controller
{
    // get all services
    public function GetServices(){
        $data['services'] = Service::orderBy('id' , 'desc')->select('id' , 'image' , 'title' , 'small_description as description')->get();
        $response = APIHelpers::createApiResponse(false , 200 ,  '' , $data);
        return response()->json($response , 200);
    }
}