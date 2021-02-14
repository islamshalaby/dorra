<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Helpers\APIHelpers;
use Illuminate\Support\Facades\Validator;
use JD\Cloudder\Facades\Cloudder;
use App\Donation;
use App\DonationImage;
use App\DonationCategory;
use App\Category;

class DonationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['GetCategories']]);
    }

    // post donation
    public function PostDonations(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'description' => "required",
            "address" => "required",
            "latitude" => "required",
            "longitude" => "required",
            
            "categories" => "required"
        ]);

        if ($validator->fails()) {
            $response = APIHelpers::createApiResponse(true , 406 ,  'بعض الحقول مفقودة' , null);
            return response()->json($response , 406);
        }



        $categories_type = gettype($request->categories);
        if($categories_type != "array" ){
            $response = APIHelpers::createApiResponse(true , 406 ,  'Categories Key Not Array' , null);
            return response()->json($response , 406);
        }

        $user = auth()->user();
        if($user->active == 0){
            $response = APIHelpers::createApiResponse(true , 406  , 'تم حظر حسابك من الادمن' , null);
            return response()->json($response , 406);
        }
        $user_id = $user->id;

        // insert donation
        $donation = new Donation();
        $donation->name = $request->name;
        $donation->phone = $request->phone;
        $donation->description = $request->description;
        $donation->address = $request->address;
        $donation->latitude = $request->latitude;
        $donation->longitude = $request->longitude;
        $donation->user_id = $user_id;
        $donation->save();

        // insert donation categories
        $categories = $request->categories;
        for($i = 0; $i < count($categories); $i++){
            $donation_category = new DonationCategory();
            $donation_category->donation_id = $donation->id;
            $donation_category->category_id = $categories[$i];
            $donation_category->save();            
        }


        $response = APIHelpers::createApiResponse(false , 200 ,  '' , $donation);
        return response()->json($response , 200);
    }
	
	    // insert images of the donation
    public function PostImage(Request $request){

        $validator = Validator::make($request->all(), [
            "image" => "required",
            "donation_id" => "required"
        ]);

        if ($validator->fails()) {
            $response = APIHelpers::createApiResponse(true , 406 ,  'بعض الحقول مفقودة' , null);
            return response()->json($response , 406);
        }

        $image = $request->image;
        Cloudder::upload("data:image/jpeg;base64,".$image, null);
        $imagereturned = Cloudder::getResult();
        $image_id = $imagereturned['public_id'];
        $image_format = $imagereturned['format'];    
        $image_new_name = $image_id.'.'.$image_format;
        $donation_image = new DonationImage();
        $donation_image->image = $image_new_name;
        $donation_image->donation_id = $request->donation_id;
        $donation_image->save();        
        $response = APIHelpers::createApiResponse(false , 200 ,  '' , $donation_image);
        return response()->json($response , 200);

    }
    
    // get user donation
    public function GetDonations(){
        $user = auth()->user();
        if($user->active == 0){
            $response = APIHelpers::createApiResponse(true , 406  , 'تم حظر حسابك من الادمن' , null);
            return response()->json($response , 406);
        }
        $user_id = $user->id;
        $data['donations'] = Donation::select('id' , 'description' , 'created_at as date')->where('user_id' , $user_id)->orderBy('id' , 'desc')->get();
        $response = APIHelpers::createApiResponse(false , 200 ,  '' , $data);
        return response()->json($response , 200);
    }

    // donation details
    public function Details(Request $request){
        $user = auth()->user();

        if($user->active == 0){
            $response = APIHelpers::createApiResponse(true , 406  , 'تم حظر حسابك من الادمن' , null);
            return response()->json($response , 406);
        }    

        $donation_id = $request->id;
        $data['donation'] = Donation::select('id' , 'description' , 'latitude' , 'longitude' , 'address' , 'name' , 'phone' , 'created_at')->find($donation_id);
        
        // get images
        $images = DonationImage::select('image')->where('donation_id' , $data['donation']['id'])->get();
        for($i = 0; $i < count($images); $i++){
           $new_images[$i] = $images[$i]['image'];   
        }
        $data['donation']['images'] = $new_images;

        // get categories
        $categories = DonationCategory::select('category_id')->where('donation_id' , $data['donation']['id'])->get();

        for($i = 0; $i < count($categories); $i++){
            $new_categories[$i] = Category::select('title_ar as title')->find($categories[$i]['category_id'])['title'];
        }
		$data['donation']['categories'] = $new_categories;
		

        $response = APIHelpers::createApiResponse(false , 200 ,  '' , $data);
        return response()->json($response , 200);
    }

    // get categories
    public function GetCategories(Request $request){
        $data['categories'] = Category::select('id' , 'title_ar as title')->where('deleted' , 0)->get();
        $response = APIHelpers::createApiResponse(false , 200 ,  '' , $data);
        return response()->json($response , 200);    
    }

}