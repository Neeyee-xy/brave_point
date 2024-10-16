<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Delivery;
use App\Enums\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{


    public function change_order_status(Request $request)
    {
        $order=Order::with('transaction','user')->find($request->order_id);
        $transaction=Transaction::where('cart_order_id',$order->cart_order_id)->first();
        if ($request->status=="Cancelled") {

            $trans_status=$this->cancel_payment($transaction);
            if ($trans_status['data']['status']=="processed") {

            }else{
               return (['success' => 'Order can not be cancelled']); 

            }
           
        }
       
       // dd($request->status);
        $order->status=$request->status;
        $order->save();

        
 return (['success' => 'Order Updated successfully']);
    }
     public function view_order(Request $request)
    {
       $order=Order::with('user')->find($request->order_id);
        $carts=Cart::with('product')->where('cart_order_id',$order->cart_order_id)->get();
       // dd($orders);
        $prices=[];
        foreach ($carts as $cart) {
            $prices[]=$cart->qty*$cart->price;
        }
        $order_details = view('pages.admin.order.view_order', compact( 'carts'))->render();

        return (['order_details' => $order_details,'total_price'=>number_format(array_sum($prices),2)]);
    }
    public function orders(Request $request)
    {
    if(Auth::user()->user_type=="Admin"){
       $orders=Order::with('user')->get();
       // dd($orders);
        return view('pages.admin.order.order',compact('orders'))->with(['page_title'=>'Orders']);

    }else{
       $orders=Order::with('user')->where('user_id',Auth::user()->id)->get();
       // dd($orders);
        return view('pages.client.order.order',compact('orders'))->with(['page_title'=>'Orders']); 
    }
    }
    public function transactions(Request $request)
    {
        if(Auth::user()->user_type=="Admin"){
       $transactions=Transaction::with('user')->get();
       // dd($transactions);
        return view('pages.admin.transactions.transactions',compact('transactions'))->with(['page_title'=>'Transactions']);;
    }else{
        $transactions=Transaction::with('user')->where('user_id',Auth::user()->id)->get();
       // dd($transactions);
        return view('pages.admin.transactions.transactions',compact('transactions'))->with(['page_title'=>'Transactions']);; 
    }
    }
    public function create_order(Request $request)
    {

        $rules = [
        'email' => 'required',
        'phone' => 'required',
        'name' => 'required',
        'address' => 'required',
        'country' => 'required',
       
        'city' => 'required',
        'postal_code' => 'required',
        
       
             
          
    ];

    $customMessages = [
        'required' => 'The :attribute  field is required.'
         

    ];
    $validate= $this->validate($request, $rules, $customMessages);

    if ($validate) {
       $user=Auth::user();
      
                $carts=Cart::with('product')->where('user_id',Auth::user()->id)->where('status','In Cart')->get();
                 $prices=[];
                    foreach ($carts as $cart) {
                        $prices[]=$cart->qty*$cart->price;
                    }
                $delivery_fee=Delivery::find($request->city);
                $total=$delivery_fee->price+array_sum($prices);  



                $order=New Order();
                $order->user_id = Auth::user()->id;
                $order->delivery_id=$request->city;
                $order->status="In-Progress";
                $order->cart_order_id=$cart->cart_order_id;
                $order->amount=$total;
                $order->save();

                $transaction=new Transaction();
                $transaction->cart_order_id=$order->cart_order_id;
                $transaction->user_id=Auth::user()->id;
                $transaction->amount=$total;
                $transaction->ref=time()."_BP"; ;
                $transaction->status="In-Progress";
                $transaction->save();
                
                Cart::where('user_id',$order->user_id)->where('status','In Cart')->update(['cart_order_id'=>$order->cart_order_id,'status'=>'In Order']);
                $user->city=$request->city;
               $user->address=$request->address;
               $user->country=$request->country;
               $user->postal_code=$request->postal_code;
               $user->save();
               $reponse= $this->int_payment($order,$transaction);
               dd($reponse);
               if ($reponse['status']=="false") {
                   if (Auth::user()->user_type==UserType::ADMIN->title()) {
                       return (['errors' => $reponse['message']]);
                   }else{
                    return (['errors' => 'Something went wrong,contact admin ']);
                   }
               }
               $transaction->ref=$reponse['data']['reference'];
               $transaction->save();

               
               

              
      return (['success' => 'User Updated successfully','authorization_url'=>$reponse['data']['authorization_url']]);

     
    }else{
        return $this->validate($request, $rules, $customMessages);
       }
    }


function int_payment($order,$transaction)
    {
       
        $email=Auth::user()->email; 
        
       
        $ref=$transaction->cart_order_id; 
        $callback_url=env('APP_URL')."/verify_payment?ref=".$ref."&order_id=".$order->cart_order_id."";
      
        $total=$order->amount*100;
        $url = "https://api.paystack.co/transaction/initialize";

        $fields = [
        'email' => "".$email."",
        'amount' => "".$total."",
        'callback_url'=>"".$callback_url."",
        ];

        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_CAINFO, 'C:/wamp64/bin/php/php8.3.0/extras/ssl/cacert.pem');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer ".$this->settings->paystack_sk."",
        "Cache-Control: no-cache",
        ));
              

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

        //execute post
        $result = curl_exec($ch);
              $error = curl_error($ch);
                if ($error) {
                    return "Curl Error: " . $error;
                    // Handle the error appropriately (e.g., log it)
                }

             
              $reponse=json_decode($result,true);
              return $reponse;
    }




function cancel_payment($transaction)
    {
       
       
        
      
        $url = "https://api.paystack.co/refund";

        $fields = [
        'transaction' => "".$transaction->ref."",
        ];

        $fields_string = http_build_query($fields);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_CAINFO, 'C:/wamp64/bin/php/php8.3.0/extras/ssl/cacert.pem');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer ".$this->settings->paystack_sk."",
        "Cache-Control: no-cache",
        ));
              

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

        //execute post
        $result = curl_exec($ch);
              $error = curl_error($ch);
                if ($error) {
                    return "Curl Error: " . $error;
                    // Handle the error appropriately (e.g., log it)
                }

             
              $reponse=json_decode($result,true);
              return $reponse;
    }



public function verify_payment(Request $request)
{
    $transaction=Transaction::where('cart_order_id',$request->ref)->first();
    $order=Order::where('cart_order_id',$request->ref)->first();

   $url = "https://api.paystack.co/transaction/verify/".$transaction->ref."";
        $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL =>  $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer ".$this->settings->paystack_sk."",
        "Cache-Control: no-cache",
    ),
  ));
  
  $result = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
     $reponse=json_decode($result,true);
  }
 


if ($reponse['data']['status']=="success") {
    // code...
$transaction->status=$reponse['data']['status'];
 $transaction->save();
 $order->status='Confirmed';
 $order->save();


}else{

    $transaction->status=$reponse['data']['status'];
 $transaction->save();
 $order->status=$reponse['data']['status'];
 $order->save();

}

 return view('pages.verify_payment',compact('transaction'));


}

public function verify_payment1(Request $request)
{
 
}


}
