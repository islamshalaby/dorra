<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Service;
use App\News;

class WebViewController extends Controller
{
    // get about
    public function getabout(Request $request){
        $setting = Setting::find(1);
        $data['text'] = $setting['aboutapp_ar'];
        return view('webview.about' , $data);
    }

    // get terms and conditions
    public function gettermsandconditions(Request $request){
            $setting = Setting::find(1);
            $data['title'] = 'الشروط و الأحكام';
            $data['text'] = $setting['termsandconditions_ar'];
            return view('webview.termsandconditions' , $data);
    }

    // get about pages
    public function getaboutpages(Request $request){
        $page_url = $request->page;
        $page_url_ar = $page_url.'_ar';
        $setting = Setting::find(1);
        $data['text'] = $setting[$page_url_ar];
        return view('webview.aboutpage' , $data);
    }

    // get service page
    public function getservice(Request $request){
        $service_id = $request->id;
        $data = Service::find($service_id);
        return view('webview.service' , $data);
    }

    // get news page
    public function getnews(Request $request){
        $news_id = $request->id;  
        $data = News::find($news_id);
        return view('webview.news' , $data);          
    }

}
