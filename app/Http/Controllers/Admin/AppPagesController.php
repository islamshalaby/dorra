<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Setting;

class AppPagesController extends AdminController{

    // get section data
    public function GetSection(Request $request){
        $section = $request->section;
        $section_ar = $section.'_ar';
        $data['setting'] = Setting::where('id' , 1)->select($section_ar)->first();
        $data['section'] = $section;
        return view('admin.apppage' , ['data' => $data]);
    }

    // post section
    public function PostSection(Request $request){
        $section = $request->section;
        $section_ar = $section.'_ar';
        if(!$request->text){
            return redirect('admin-panel/app_pages/'.$section)->with('status' , 'Missing Required Field');
        }
        $setting = Setting::find(1);
        $setting->$section_ar = $request->text;
        $setting->save();
        return redirect('admin-panel/app_pages/'.$section);
    }
    

}