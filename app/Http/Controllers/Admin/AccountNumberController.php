<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\AccountNumber;
use App\Bank;

class AccountNumberController extends AdminController{
    
    // get all account numbers
    public function show(){
        $data['account_numbers'] = AccountNumber::orderBy('id' , 'desc')->get();
        for($i = 0 ; $i < count($data['account_numbers']) ; $i++ ){
            $bank =  Bank::find($data['account_numbers'][$i]['bank_id']);
            $data['account_numbers'][$i]['bank_name'] = $bank['bank_name'];
        }
        return view('admin.accounts_numbers' , ['data' => $data]);
    }

    // get add new bank account
    public function AddGet(){
        $data['banks'] = Bank::get();
        return view('admin.accounts_numbers_form' , ['data' => $data]);
    }

    // post add new bank account
    public function AddPost(Request $request){
        $account_number = new AccountNumber();
        $account_number->account_name = $request->account_name;
        $account_number->account_type = $request->account_type;
        $account_number->account_number = $request->account_number;
        $account_number->iban = $request->iban;
        $account_number->bank_id = $request->bank_id;
        $account_number->save();
        return redirect('admin-panel/accounts_numbers/show');
    }

    // get edit page
    public function EditGet(Request $request){
        $data['account_number'] = AccountNumber::find($request->id);
        $data['banks'] = Bank::get();
        return view('admin.accounts_numbers_edit' , ['data' => $data]);
    }

    // post edit page
    public function EditPost(Request $request){
        $account_number = AccountNumber::find($request->id);
        $account_number->account_name = $request->account_name;
        $account_number->account_type = $request->account_type;
        $account_number->account_number = $request->account_number;
        $account_number->iban = $request->iban;
        $account_number->bank_id = $request->bank_id;
        $account_number->save();
        return redirect('admin-panel/accounts_numbers/show');
    }

    // delete account number
    public function delete(Request $request){
        $account_number = AccountNumber::find($request->id);
        $account_number->delete();
        return back();
    }

}