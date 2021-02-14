<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Helpers\APIHelpers;
use Illuminate\Support\Facades\Validator;
use App\Product;
use App\ProductImage;
use App\Category;
use App\Order;

class ProductController extends Controller
{
    // get all services
    public function GetProducts(Request $request){
        if($request->category_id){
            $data['products'] = Product::where('category_id' , $request->category_id)->orderBy('id' , 'desc')->select('id'  , 'title')->simplePaginate(20);
        }else{
            $data['products'] = Product::orderBy('id' , 'desc')->select('id'  , 'title')->simplePaginate(20);
        }

        for($i = 0; $i < count($data['products']); $i++){
            $image = ProductImage::where('product_id' , $data['products'][$i]['id'])->select('image')->first();
            if($image){
                $data['products'][$i]['image'] = $image['image'];
            }else{
                $data['products'][$i]['image'] = null; 
            }
            
        }
        $data['categories'] = Category::select('id' , 'title_ar as title')->where('deleted' , 0)->get();
        $response = APIHelpers::createApiResponse(false , 200 ,  '' , $data);
        return response()->json($response , 200);
    }



    // get product Details
    public function ProductDetails(Request $request){
        $product_id = $request->id;
        $data['product'] =  Product::select('id' , 'title' , 'description')->find($product_id);
        $images = ProductImage::where('product_id' , $data['product']['id'])->select('image')->get();
        // return $images;  
        $newImages = [];  
        for($i = 0; $i < count($images) ; $i++){
            $newImages[$i] = $images[$i]['image'];
        }
        $data['product']['images'] =$newImages;
        $response = APIHelpers::createApiResponse(false , 200 ,  '' , $data);
        return response()->json($response , 200);
    }

    // request order
    public function Request(Request $request){
        
        $validator = Validator::make($request->all(), [
            'product_id' => 'required',
            'name' => 'required',
            "phone" => 'required',
            "address" => 'required',
            "latitude" => 'required',
            "longitude" => 'required',
            "gender" => 'required',
            "birth_date" => "required",
            "family_count" => "required",
            "salary" => "required",
            "social_status" => "required"            
        ]);

        if ($validator->fails()) {
            $response = APIHelpers::createApiResponse(true , 406 ,  'بعض الحقول مفقودة' , null);
            return response()->json($response , 406);
        }

        $returned_product = Product::select('id')->find($request->product_id);
        if(!$returned_product){
            $response = APIHelpers::createApiResponse(true , 400 ,  'هذا المنتج غير متاح' , null);
            return response()->json($response , 400);
        }
        
        $order = new Order();
        $order->product_id = $request->product_id;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->latitude = $request->latitude;
        $order->longitude = $request->longitude;
        $order->gender = $request->gender;
        $order->birth_date = $request->birth_date;
        $order->family_count = $request->family_count;
        $order->salary = $request->salary;
        $order->social_status = $request->social_status;
        $order->save();
        $data['order'] = $order;
        $response = APIHelpers::createApiResponse(false , 200 ,  '' , $data);
        return response()->json($response , 200);         
    }

}