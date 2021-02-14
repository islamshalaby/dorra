<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Facades\DB;
use App\News;

class NewsController extends AdminController{

    // get all news
    public function show(){
        $data['news'] = News::orderBy('id' , 'desc')->get();
        return view('admin.news' , ['data' => $data]);
    }

    // get add new page
    public function AddGet(){
        return view('admin.news_form');
    }
    
    // post add new news
    public function AddPost(Request $request){
        $image_name = $request->file('image')->getRealPath();
        Cloudder::upload($image_name, null);
        $imagereturned = Cloudder::getResult();
        $image_id = $imagereturned['public_id'];
        $image_format = $imagereturned['format'];    
        $image_new_name = $image_id.'.'.$image_format;
        $news = new News();
        $news->image = $image_new_name;
        $news->title = $request->title;
        $news->small_description = $request->small_description;
        $news->description = $request->description;
        $news->save();
        return redirect('admin-panel/news/show');
    }

    // get edit page
    public function EditGet(Request $request){
        $data['news'] = News::find($request->id);
        return view('admin.news_edit' , ['data' => $data]);
    }

    // post edit news
    public function EditPost(Request $request){
        $news = News::find($request->id);
        if($request->file('image')){
            $image = $news->image;
            $publicId = substr($image, 0 ,strrpos($image, "."));    
            Cloudder::delete($publicId);
            $image_name = $request->file('image')->getRealPath();
            Cloudder::upload($image_name, null);
            $imagereturned = Cloudder::getResult();
            $image_id = $imagereturned['public_id'];
            $image_format = $imagereturned['format'];    
            $image_new_name = $image_id.'.'.$image_format;
            $news->image = $image_new_name;
        }
        $news->title = $request->title;
        $news->small_description = $request->small_description;
        $news->description = $request->description;
        $news->save();
        return redirect('admin-panel/news/show');
    }

    // delete news
    public function delete(Request $request){
        $news = News::find($request->id);
        if($news){
            $news->delete();
        }
        return redirect('admin-panel/news/show');
    }

}