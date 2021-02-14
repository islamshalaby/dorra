<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\Product;
use App\ProductImage;

class OrderController extends AdminController{
    
    // get all orders
    public function show(){
        $data['orders'] = Order::select('name' , 'phone' , 'created_at' , 'id' ,'seen')->orderBy('id' , 'desc')->get();
        return view('admin.orders' , ['data' => $data]);
    }

    // delete order
    public function delete(Request $request){
        $order = Order::find($request->id);
        $order->delete();
        return back();
    }
    
    // get order details
    public function GetDetails(Request $request){
        $data['order'] = Order::find($request->id);
        $data['order']->seen = 1;
        $data['order']->save();
        $data['order']['product'] = Product::find($data['order']['product_id']);
        $image = ProductImage::where('product_id' , $data['order']['product']['id'])->first();
        if($image){
            $data['order']['product']['image'] = $image['image'];
        }else{
            $data['order']['product']['image'] = null;
        }
        
        
        return view('admin.order_details' , ['data' => $data]);
    }

}