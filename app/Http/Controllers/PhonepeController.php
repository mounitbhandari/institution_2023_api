<?php

namespace App\Http\Controllers;

use App\Models\Phonepe;
use App\Http\Requests\StorePhonepeRequest;
use App\Http\Requests\UpdatePhonepeRequest;
use Illuminate\Http\Request;
use App\Http\Resources\FeesChargedResource;
use App\Http\Resources\TransactionMasterResource;
use App\Http\Resources\TransactionMasterReceivedResource;
use App\Http\Resources\TransactionMasterSpecialResource;
use App\Models\CustomVoucher;
use App\Models\Ledger;
use App\Models\StudentCourseRegistration;
use App\Models\TransactionDetail;
use App\Models\TransactionMaster;
use App\Models\WorkingDay;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Ixudra\Curl\Facades\Curl;

class PhonepeController extends Controller
{
  private $apiKey;
 
  /* public function phonePe(Request $request) */
  public function phonePe($amount,$merchantId,$apiKey,$merchantUserId,$autoGenerateId)
  {
    $this->$apiKey = $apiKey;
    //$merchantId = 'PGTESTPAYUAT';
    $keyIndex=1;
    //$input = $request->all();
    //$amount=$input['amount'];
    //$amount = $request->input('amount');
    $merchantTransactionId="TRAN".rand().'_'.time();
    $paymentData = array(
  'autoId'=>$autoGenerateId,
  'merchantId' => $merchantId,
  'merchantTransactionId' => $autoGenerateId,
  'merchantUserId'=>$merchantUserId,
  'amount' => $amount*100, // Amount in paisa (10 INR)
  'redirectUrl'=>route('response'),
  'redirectMode'=>"POST",
  'callbackUrl'=>route('response'),
  "paymentInstrument"=> array(    
  "type"=> "PAY_PAGE",
)
);
$jsonencode = json_encode($paymentData);
$payloadMain = base64_encode($jsonencode);

$payload = $payloadMain . "/pg/v1/pay" . $apiKey;
$sha256 = hash("sha256", $payload);
$final_x_header = $sha256 . '###' . $keyIndex;
$request = json_encode(array('request'=>$payloadMain));

$curl = curl_init();
curl_setopt_array($curl, [
CURLOPT_URL => "https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 20,
CURLOPT_TIMEOUT => 60,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
 CURLOPT_POSTFIELDS => $request,
CURLOPT_HTTPHEADER => [
  "Content-Type: application/json",
   "X-VERIFY: " . $final_x_header,
   "accept: application/json"
],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
echo "cURL Error #:" . $err;
} else {
 $res = json_decode($response);
 //print_r($res)
if(isset($res->success) && $res->success=='1'){
    $paymentCode=$res->code;
    $paymentMsg=$res->message;
    $payUrl=$res->data->instrumentResponse->redirectInfo->url;

    //header('Location:'.$payUrl) ;
    return redirect()->to($payUrl);
  } 
}
} 
public function response(Request $request)
{
  //echo"Barrackpore Academy of Information Technology";
    $input = $request->all();
   // print_r($input);
    $object = json_decode(json_encode($input));
    //return response()->json(['success'=>1,'data'=> $object], 200,[],JSON_NUMERIC_CHECK); 
     $saltKey = '099eb0cd-02cf-4e2a-8aca-3e6c6aff0399';
    $saltIndex = 1;

    $finalXHeader = hash('sha256','/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'].$saltKey).'###'.$saltIndex;

    $response = Curl::to('https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'])
            ->withHeader('Content-Type:application/json')
            ->withHeader('accept:application/json')
            ->withHeader('X-VERIFY:'.$finalXHeader)
            ->withHeader('X-MERCHANT-ID:'.$input['transactionId'])
            ->get();

            $res = json_decode($response);
            $responseCode=$res->data->responseCode;
            $code=$res->code;
            $merchantId=$res->data->merchantId;
            $merchantTransactionId=$res->data->merchantTransactionId;
            $transactionId=$res->data->transactionId;
            $amount=$res->data->amount;
            $orginalAmount=$amount/100;
            $cardType=$res->data->paymentInstrument->type;
            $pgTransactionId=$res->data->paymentInstrument->pgTransactionId;
            $arn=$res->data->paymentInstrument->arn;
     if($res->data->responseCode==="SUCCESS"){
          $Phonepe= new Phonepe();
          $Phonepe ->code = $code;
          $Phonepe ->merchantId = $merchantId;
          $Phonepe ->merchantTransactionId = $merchantTransactionId;
          $Phonepe ->transactionId = $transactionId;
          $Phonepe ->amount = $orginalAmount;
          $Phonepe ->cardType = $cardType;
          $Phonepe ->pgTransactionId = $pgTransactionId;
          $Phonepe ->arn = $arn;
          $Phonepe->save();
      //echo "code:".$res->data->code;
      //return response()->json(['success'=>1,'data'=> $arn], 200,[],JSON_NUMERIC_CHECK);
      //return redirect()->away('https://simplifyist.in/#/StudentUser');
      return redirect()->away('http://localhost:4200/#/StudentUser');
    }
    else{
      return redirect()->away('https://Google.co.in');
    }    

  }
  public function check_merchantTransactionId($merchantTransactionId){
    $existsId=Phonepe::where('merchantTransactionId', $merchantTransactionId)->exists();
      if ($existsId) {
        return response()->json(['success'=>1,'data'=>"Yes Exists"], 200,[],JSON_NUMERIC_CHECK);
      }
      else{
        return response()->json(['success'=>0,'data'=>"Not Exists"], 200,[],JSON_NUMERIC_CHECK);
      }
  }
  public function save_fees_received_online($merchantTransactionId,Request $request)
    {
      //$merchantTransactionId = $request->input('merchantTransactionId');
      $existsId=Phonepe::where('merchantTransactionId', $merchantTransactionId)->exists();
      if ($existsId) {
        //fees received
        $input=($request->json()->all());

        $validator = Validator::make($input,[
            'transactionMaster' => 'required',
            'transactionDetails' => ['required',function($attribute, $value, $fail){
                $dr=0;
                $cr=0;
                foreach ($value as $v ){
                    //if transaction type id is incorrect
                    if(!($v['transactionTypeId']==1 || $v['transactionTypeId']==2)){
                        return $fail("Transaction type id is incorrect");
                    }

                    //checking debit and credit equality
                    if($v['transactionTypeId']==1){
                        $dr=$dr+$v['amount'];
                    }
                    if($v['transactionTypeId']==2){
                        $cr=$cr+$v['amount'];
                    }
                }
                //if debit and credit are not equal will through error
                if($dr!=$cr){
                    $fail("As per accounting rule Debit({$dr})  and Credit({$cr}) should be same");
                }
            }],
        ]);
        if($validator->fails()){
            return response()->json(['success'=>0,'data'=>null,'error'=>$validator->messages()], 200,[],JSON_NUMERIC_CHECK);
        }

        $input=($request->json()->all());
        $input_transaction_master=(object)($input['transactionMaster']);
        $input_transaction_details=($input['transactionDetails']);

        //validation for transaction master
        $rules = array(
            'userId'=>'required|exists:users,id',
            'transactionDate' => 'bail|required|date_format:Y-m-d',
            'referenceTransactionMasterId'=>['required','exists:transaction_masters,id',
                function($attribute, $value, $fail){
                    $TM = TransactionMaster::find($value);
                    if(!$TM){
                        return $fail($value.' no such transactions exists');
                    }
                    if($TM->voucher_type_id!=9){
                        return $fail($value.' this is not a Fees Entry');
                    }
                }]
        );
        $messages = array(
            'transactionDate.required'=>'Transaction Date is required',
            'transactionDate.date_format'=>'Date format should be yyyy-mm-dd',
        );

        $validator = Validator::make($input['transactionMaster'],$rules,$messages );


        if ($validator->fails()) {
            return response()->json(['position'=>1,'success'=>0,'data'=>null,'error'=>$validator->messages()], 406,[],JSON_NUMERIC_CHECK);
        }

        //details verification
        //validation
        $rules = array(
            "*.transactionTypeId"=>["required","in:1,2"]
        );
        $validator = Validator::make($input['transactionDetails'],$rules,$messages );
        if ($validator->fails()) {
            return response()->json(['position'=>1,'success'=>0,'data'=>null,'error'=>$validator->messages()], 406,[],JSON_NUMERIC_CHECK);
        }
        DB::beginTransaction();
        try{
            $result_array=array();
            $accounting_year = get_accounting_year($input_transaction_master->transactionDate);
            $voucher="Fees Received";
            $customVoucher=CustomVoucher::where('voucher_name','=',$voucher)->where('accounting_year',"=",$accounting_year)->first();
            if($customVoucher) {
                //already exist
                $customVoucher->last_counter = $customVoucher->last_counter + 1;
                $customVoucher->save();
            }else{
                //fresh entry
                $customVoucher= new CustomVoucher();
                $customVoucher->voucher_name=$voucher;
                $customVoucher->accounting_year= $accounting_year;
                $customVoucher->last_counter=1;
                $customVoucher->delimiter='-';
                $customVoucher->prefix='RPT';
                $customVoucher->save();
            }
            //adding Zeros before number
            $counter = str_pad($customVoucher->last_counter,5,"0",STR_PAD_LEFT);

            //creating sale bill number
            $transaction_number = $customVoucher->prefix.'-'.$counter."-".$accounting_year;
            $result_array['transaction_number']=$transaction_number;

            //saving transaction master
            $transaction_master= new TransactionMaster();
            $transaction_master->voucher_type_id = 4; // 4 is the voucher_type_id in voucher_types table for Receipt voucher
            $transaction_master->transaction_number = $transaction_number;
            $transaction_master->transaction_date = $input_transaction_master->transactionDate;
            $transaction_master->fees_year = $input_transaction_master->feesYear;
            $transaction_master->fees_month = $input_transaction_master->feesMonth;
            $transaction_master->reference_transaction_master_id = $input_transaction_master->referenceTransactionMasterId;
            $transaction_master->comment = $input_transaction_master->comment;
            $transaction_master->merchantTransactionId = $merchantTransactionId;
            $transaction_master->organisation_id = $input_transaction_master->organisationId;
            $transaction_master->save();
            $result_array['transaction_master']=$transaction_master;
            $transaction_details=array();
            foreach($input_transaction_details as $transaction_detail){
                $detail = (object)$transaction_detail;
                $td = new TransactionDetail();
                $td->transaction_master_id = $transaction_master->id;
                $td->ledger_id = $detail->ledgerId;
                $td->transaction_type_id = $detail->transactionTypeId;
                $td->amount = $detail->amount;
                $td->save();
                $transaction_details[]=$td;
            }
            $result_array['transaction_details']=$transaction_details;
            DB::commit();

        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 500);
        }

        return response()->json(['success'=>1,'data'=>new TransactionMasterResource($result_array['transaction_master'])], 200,[],JSON_NUMERIC_CHECK);
    
      }
      else{
        return response()->json(['success'=>0,'data'=>"Not Exists"], 200,[],JSON_NUMERIC_CHECK);
      }
    }
}
