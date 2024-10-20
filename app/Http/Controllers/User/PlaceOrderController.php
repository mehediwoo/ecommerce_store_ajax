<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;
use App\Models\billing_info;
use App\Models\payment_method;

class PlaceOrderController extends Controller
{
    public function place_order(Request $request)
    {
        $request->validate([
            'payment'=>'required'
        ],[
            'payment.required'=>'Please choose an payment systeam'
        ]);

        $customer_id    = session()->get('customer_id');
        $customer_name  = session()->get('name');
        $customer_email = session()->get('email');
        $billing_info = billing_info::where('customer_id',$customer_id)->first();
        $payment = $request->input('payment');

        if ($payment=='cash') {
            foreach (session()->get('cart') as $key => $iteam) {

                $order = new order;
                $order->customer_id = $customer_id ;
                $order->product_id = $key ;
                $order->p_name = $iteam['name'];
                $order->p_qty  = $iteam['qty'];
                $order->p_price = $iteam['price'];
                $order->p_image = $iteam['image'];
                $order->c_phone = $billing_info->phone;
                $order->c_city = $billing_info->city;
                $order->c_addr = $billing_info->address;
                $order->status = 'processing';
                $result = $order->save();
            }
            if ($result) {
                session()->forget('cart');
                return redirect()->back()->with('success','Your order has been processing');
            }
        }elseif ($payment=='online') {

            // get total price
            $total = 0;
            foreach (session()->get('cart') as $key => $iteam) {

                $total = $total + $iteam['qty']*$iteam['price'];
                
            }
            
            $payment_source = payment_method::where('status',1)->first();
            if ($payment_source) {
                
                $tran_id = "pay".rand(1111111,9999999);//unique transection id for every transection 

                $currency= "BDT"; //aamarPay support Two type of currency USD & BDT  

                $amount = $total;   //10 taka is the minimum amount for show card option in aamarPay payment gateway
        
                //For live Store Id & Signature Key please mail to support@aamarpay.com
                $store_id = $payment_source->store_id; 

                $signature_key = $payment_source->signature_key; 

                $url = "https://secure.aamarpay.com/jsonpost.php"; // for Live Transection use "https://secure.aamarpay.com/jsonpost.php"

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS =>'{
                        "store_id": "'.$store_id.'",
                        "tran_id": "'.$tran_id.'",
                        "success_url": "'.route('success').'",
                        "fail_url": "'.route('fail').'",
                        "cancel_url": "'.route('cancel').'",
                        "amount": "'.$amount.'",
                        "currency": "'.$currency.'",
                        "signature_key": "'.$signature_key.'",
                        "desc": "Merchant Registration Payment",
                        "cus_name": "'.$customer_name.'",
                        "cus_email": "'.$customer_email.'",
                        "cus_add1": "'.$billing_info->address.'",
                        "cus_add2": "Mohakhali DOHS address 2",
                        "cus_city": "'.$billing_info->city.'",
                        "cus_country": "Bangladesh",
                        "cus_phone": "'.$billing_info->phone.'",
                        "type": "json"
                    }',
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json'
                    ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                // dd($response);
        
                $responseObj = json_decode($response);

                if(isset($responseObj->payment_url) && !empty($responseObj->payment_url)) {

                    $paymentUrl = $responseObj->payment_url;
                    // dd($paymentUrl);
                    return redirect()->away($paymentUrl);

                }else{
                    echo $response;
                }

            }else{
                return 2;
            }
                    
        }
    }

    public function success(Request $request){

        $request_id= $request->mer_txnid;

        //verify the transection using Search Transection API 

        $url = "http://sandbox.aamarpay.com/api/v1/trxcheck/request.php?request_id=$request_id&store_id=aamarpaytest&signature_key=dbb74894e82415a2f7ff0ec3a97e4183&type=json";
        
        //For Live Transection Use "http://secure.aamarpay.com/api/v1/trxcheck/request.php"
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $customer_id    = session()->get('customer_id');
        $customer_name  = session()->get('name');
        $customer_email = session()->get('email');
        $billing_info = billing_info::where('customer_id',$customer_id)->first();

        //insert data to order
        foreach (session()->get('cart') as $key => $iteam) {
            $order = new order;
            $order->customer_id =$customer_id ;
            $order->product_id = $key ;
            $order->p_name = $iteam['name'];
            $order->p_qty  = $iteam['qty'];
            $order->p_price = $iteam['price'];
            $order->p_image = $iteam['image'];
            $order->c_phone =$billing_info->phone;
            $order->c_city = $billing_info->city;
            $order->c_addr = $billing_info->address;
            $order->status = 'complete';
            $result = $order->save();
        }
        

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
        if ($result) {
            session()->forget('cart');
            return redirect()->back()->with('success','Your order has been complete');
        }

    }

    public function fail(Request $request){
        return redirect()->route('checkout')->with('error','Your payment is faield, please try again');
    }

    public function cancel(){
        return redirect()->route('checkout')->with('error','Your payment has been cancle');
    }
}
