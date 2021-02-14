<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Facades\DB;
use App\Service;

class ServiceController extends AdminController{

    // get all news
    public function show(){
        $data['services'] = Service::orderBy('id' , 'desc')->get();
        return view('admin.services' , ['data' => $data]);
    }

    // // get add new page
    public function AddGet(){
        return view('admin.services_form');
    }
    
    // post add new service
    public function AddPost(Request $request){
        $image_name = $request->file('image')->getRealPath();
        Cloudder::upload($image_name, null);
        $imagereturned = Cloudder::getResult();
        $image_id = $imagereturned['public_id'];
        $image_format = $imagereturned['format'];    
        $image_new_name = $image_id.'.'.$image_format;
        $service = new Service();
        $service->image = $image_new_name;
        $service->title = $request->title;
        $service->small_description = $request->small_description;
        $service->description = $request->description;
        $service->save();
        return redirect('admin-panel/charitable_services/show');
    }

    // get edit page
    public function EditGet(Request $request){
        $data['service'] = Service::find($request->id);
        return view('admin.service_edit' , ['data' => $data]);
    }

    // post edit news
    public function EditPost(Request $request){
        $service = Service::find($request->id);
        if($request->file('image')){
            $image = $service->image;
            $publicId = substr($image, 0 ,strrpos($image, "."));    
            Cloudder::delete($publicId);
            $image_name = $request->file('image')->getRealPath();
            Cloudder::upload($image_name, null);
            $imagereturned = Cloudder::getResult();
            $image_id = $imagereturned['public_id'];
            $image_format = $imagereturned['format'];    
            $image_new_name = $image_id.'.'.$image_format;
            $service->image = $image_new_name;
        }
        $service->title = $request->title;
        $service->small_description = $request->small_description;
        $service->description = $request->description;
        $service->save();
        return redirect('admin-panel/charitable_services/show');
    }

    // delete service
    public function delete(Request $request){
        $service = Service::find($request->id);
        if($service){
            $service->delete();
        }
        return redirect('admin-panel/charitable_services/show');
    }

}