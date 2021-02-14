<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Helpers\APIHelpers;
use App\Bank;
use App\AccountNumber;


class BankController extends Controller
{
    // get all banks
    public function GetBanks(){
        $data['banks'] = Bank::select('id' , 'bank_name')->get();
        for($i = 0; $i<count($data['banks']); $i++ ){
            $data['banks'][$i]['accounts'] = AccountNumber::select('id','account_name' , 'account_type' , 'account_number' , 'iban')->where('bank_id' , $data['banks'][$i]['id'])->get();
        }
        $response = APIHelpers::createApiResponse(false , 200 ,  '' , $data);
        return response()->json($response , 200);
    }   
}