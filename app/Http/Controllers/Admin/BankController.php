<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Bank;
use App\AccountNumber;

class BankController extends AdminController{

    // get all banks
    public function show(){
        $data['banks'] = Bank::orderBy('id' , 'desc')->get();
        return view('admin.banks' , ['data' => $data]);
    }

    // get add new bank page
    public function AddGet(){
        return view('admin.bank_form');
    }

    // post add new bank
    public function AddPost(Request $request){
       $bank = new Bank();
       $bank->bank_name = $request->bank_name;
       $bank->save();
       return redirect('admin-panel/banks/show');
    }

    // get edit page bank
    public function EditGet(Request $request){
        $data['bank'] = Bank::find($request->id);
        return view('admin.bank_edit' , ['data' => $data]);
    }

    // post edit page bank
    public function EditPost(Request $request){
        $bank = Bank::find($request->id);
        $bank->bank_name = $request->bank_name;
        $bank->save();
        return redirect('admin-panel/banks/show');
    }

    // delete bank 
    public function delete(Request $request){
        $bank = Bank::find($request->id);
        $acount_numbers = AccountNumber::where('bank_id' , $bank->id)->get();
        for($i = 0; $i < count($acount_numbers) ; $i++ ){
            $acount_numbers[$i]->delete();
        }
        $bank->delete();
        return back();
    }
    
}