<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ContactUs;
use App\User;
use App\Order;
use App\Donation;
use App\Product;
use App\News;
use App\Service;

class HomeController extends AdminController{

    // get all contact us messages
    public function show(){
        $data['users'] = User::count();
        // $data['visits'] = 10;
        $data['orders'] = Order::count();
        $data['donations'] = Donation::count();
        $data['products'] = Product::count();
        $data['services'] = Service::count();
        $data['news'] = News::count();        
        return view('admin.home' , ['data' => $data]);   
    }

}