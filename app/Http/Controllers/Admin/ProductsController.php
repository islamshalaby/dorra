<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductsController extends AdminController{

    // get all products
    public function show(){
        $data['products'] = Product::orderBy('id' , 'desc')->get();
        for($i = 0; $i < count($data['products']) ; $i++){
            $image = ProductImage::where('product_id',$data['products'][$i]['id'])->first();
            if($image){
                $data['products'][$i]['image'] = $image['image'];
            }else{
                $data['products'][$i]['image'] = null;
            }    
        }
        return view('admin.products' , ['data' => $data]);
    }

    // get edit product
    public function EditGet(Request $request){
        $id = $request->id; 
        $data['product'] = Product::find($id);
        $data['categories'] = Category::get();
        $data['product_images'] = ProductImage::where('product_id' , $id)->get();
        return view('admin.product_edit' , ['data' => $data]);
    }

    // get add product
    public function AddGet(Request $request){
        $data['categories'] = Category::where('deleted' , 0)->get();
        return view('admin.product_form' , ['data' => $data]);
    }

    // post add product
    public function AddPost(Request $request){
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->save();
        $product_id = $product->id;

        for($i = 0 ; $i < count($request->file('image')); $i++){
            $image_name = $request->file('image')[$i]->getRealPath();
            Cloudder::upload($image_name, null);
            $imagereturned = Cloudder::getResult();
            $image_id = $imagereturned['public_id'];
            $image_format = $imagereturned['format'];    
            $image_new_name = $image_id.'.'.$image_format;
            $product_image = new ProductImage();
            $product_image->image = $image_new_name;
            $product_image->product_id = $product_id;
            $product_image->save();
        }
        return redirect('admin-panel/products/show');
    }

    // delete product
    public function delete(Request $request){
        $product = Product::find($request->id);
        $product_images = ProductImage::where('product_id' , $product->id)->get();
        for($i = 0 ; $i < count($product_images) ; $i++){
            $publicId = substr($product_images[$i]['image'], 0 ,strrpos($product_images[$i]['image'], "."));    
            Cloudder::delete($publicId);
            $product_images[$i]->delete();    
        }
        $product->delete();
        return redirect()->back();
    }

    // delete image of the product
    public function DeleteImage(Request $request){
        $product_image = ProductImage::find($request->id);
        $publicId = substr($product_image['image'], 0 ,strrpos($product_image['image'], "."));
        CLoudder::delete($publicId);
        $product_image->delete();
        return redirect('admin-panel/products/edit/'.$product_image->product_id);
    }

    // post get
    public function EditPost(Request $request){
        $product = Product::find($request->id);

        if($request->file('image')){
            for($i = 0 ; $i < count($request->file('image')); $i++ ){
                $image_name = $request->file('image')[$i]->getRealPath();
                Cloudder::upload($image_name, null);
                $imagereturned = Cloudder::getResult();
                $image_id = $imagereturned['public_id'];
                $image_format = $imagereturned['format'];    
                $image_new_name = $image_id.'.'.$image_format;
                $product_image = new ProductImage();
                $product_image->image = $image_new_name;
                $product_image->product_id = $product->id;
                $product_image->save();
            }
        }

        $product->title = $request->title;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect('admin-panel/products/show');
    }

}