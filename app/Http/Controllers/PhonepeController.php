<?php

namespace App\Http\Controllers;

use App\Models\Phonepe;
use App\Http\Requests\StorePhonepeRequest;
use App\Http\Requests\UpdatePhonepeRequest;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class PhonepeController extends Controller
{
 
  /* public function phonePe(Request $request) */
  public function phonePe($amount,$merchantId,$apiKey,$merchantUserId,$autoGenerateId)
  {
    //$apiKey = '099eb0cd-02cf-4e2a-8aca-3e6c6aff0399';
    //$merchantId = 'PGTESTPAYUAT';
    $keyIndex=1;
    //$input = $request->all();
    //$amount=$input['amount'];
    //$amount = $request->input('amount');
    $merchantTransactionId="TRAN".rand().'_'.time();
    $paymentData = array(
  'autoId'=>$autoGenerateId,
  'merchantId' => $merchantId,
  'merchantTransactionId' => $merchantTransactionId,
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
  
     if($res->data->responseCode==="SUCCESS"){
      return response()->json(['success'=>1,'data'=> $res], 200,[],JSON_NUMERIC_CHECK);
      //return redirect()->away('https://simplifyist.in/#/StudentUser');
    }
    else{
      return redirect()->away('https://Google.co.in');
    }    
   


     
}
public function response_tested(Request $request)
{
  //echo"Barrackpore Academy of Information Technology";
    $input = $request->all();
    //print_r($input->code);
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
    //dd(json_decode($response));
    //return $res->data->responseCode;
     if($res->data->responseCode==="SUCCESS"){
      return response()->json(['success'=>1,'data'=> $res], 200,[],JSON_NUMERIC_CHECK);
      //return redirect()->away('https://simplifyist.in/#/StudentUser');
    }
    else{
      return redirect()->away('https://Google.co.in');
    }   
   

/*             {#290 ▼ // app\Http\Controllers\PhonePecontroller.php:29
      +"success": true
      +"code": "PAYMENT_SUCCESS"
      +"message": "Your payment is successful."
      +"data": {#279 ▼
        +"merchantId": "PGTESTPAYUAT"
        +"merchantTransactionId": "MT7850590068188104"
        +"transactionId": "T2312122043389944676246"
        +"amount": 10000
        +"state": "COMPLETED"
        +"responseCode": "SUCCESS"
        +"paymentInstrument": {#293 ▼
          +"type": "UPI"
          +"vpa": null
          +"maskedAccountNumber": "XXXXXXXXXX890125"
          +"ifsc": "AABF0009009"
          +"utr": "206850679072"
          +"upiTransactionId": "AXLd8ee55a8fd50452da92639907560b6cd"
          +"accountHolderName": "Rajesh Kumar"
        }
      }
    } */
}
}
