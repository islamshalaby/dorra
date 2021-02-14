<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Donation;
use App\DonationImage;
use App\DonationCategory;
use App\Category;

class DonationController extends AdminController{

    // get all donations
    public function show(){
        $data['donations'] = Donation::orderBy('id' , 'desc')->get();
        return view('admin.donations' , ['data' => $data]);
    }

    // get donation details
    public function GetDetails(Request $request){
        $data['donation'] = Donation::find($request->id);
        $data['donation']->seen = 1;
        $data['donation']->save();
        $data['donation']['images'] = DonationImage::where('donation_id' , $data['donation']['id'])->get();
        $categories = DonationCategory::where('donation_id' , $data['donation']['id'])->get();
        $cats = [];
        for($i = 0 ; $i < count($categories) ; $i++){
            $cats[$i] =  Category::find($categories[$i]['category_id']);
        }
        $data['donation']['categories'] = $cats;
        return view('admin.donation_details' , ['data' => $data]);
    }

    // delete donation
    public function delete(Request $request){
        $donation = Donation::find($request->id);
        $donation_images = DonationImage::where('donation_id' , $donation->id)->get();
        for($i = 0 ; $i < count($donation_images) ; $i++){
            $donation_images[$i]->delete();
        }

        $donation_categories = DonationCategory::where('donation_id' , $donation->id)->get();
        for($i = 0; $i < count($donation_categories) ; $i++){
            $donation_categories[$i]->delete(); 
        }
        $donation->delete();
        return back();
    }

}