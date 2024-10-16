<?php


namespace App\Observers;

use App\Models\Order;
use App\Models\Notification;
use App\Models\Cart;
use App\Models\Delivery;
use App\Models\Setting;
use App\Models\Transaction;
use App\Mail\NotificationMaller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class OrderObserver
{
    public function updated(Order $order)
    {
       
        if ($order->status=="Order On the Way") {
             $data = [
            'name' =>$order->user->name,
            'subject'=>'Your Order is Shipped',
            'url_description' => 'Your Order is Shipped',
            'body'=>'',
        ];
        $data['body'] ="Dear <b>".$order->user->name."</b>,<br>

            <h6>Thank you for your recent order. <br>Your order number is #{{$order->cart_order_id}}. <br>We've received your order and it's currently being Shipped.<br>

           

            If you have any questions, please don't hesitate to contact our customer service team at [Customer Service Contact Information].</h6>";

            Notification::create([
                    'user_id' => $order->user_id,
                    'user_type' => 'Client',
                    'message' => 'Your Order is Shipped',
                    'message_type' => 'order',
                    'status'=> 'false'
                ]);

        Mail::to($order->user->email)->queue(new NotificationMaller($data));
        }if ($order->status=="Cancelled") {
             $data = [
            'name' =>$order->user->name,
            'subject'=>'Your Order is Cancelled',
            'url_description' => 'Your Order is Cancelled',
            'body'=>'',
        ];
        $data['body'] ="Dear <b>".$order->user->name."</b>,<br>

            <h6>Thank you for your recent order. <br>Your order number is #{{$order->cart_order_id}}. <br>Has Been Cancelled.<br>

           
            Kindly expect your refund in 7 - 12 business days.
            <br>
            If you have any questions, please don't hesitate to contact our customer service team at [Customer Service Contact Information].</h6>";
            Notification::create([
                    'user_id' => $order->user_id,
                    'user_type' => 'Client',
                    'message' => 'Your Order is Cancelled,Kindly expect your refund in 7 - 12 business days',
                    'message_type' => 'order',
                    'status'=> 'false'
                ]);
            Notification::create([
                    'user_type' => 'Admin',
                    'message' => 'Order is Cancelled for/by '.$order->user->name.'',
                    'message_type' => 'order',
                    'status'=> 'false'
                ]);

        Mail::to($order->user->email)->queue(new NotificationMaller($data));
        $settings=Setting::first();
        if ($settings->admin_email!==null) {
            Mail::to($settings->admin_email)->queue(new NotificationMaller($data));
        }
        }elseif ($order->status=="Order Completed") {
             $data = [
            'name' =>$order->user->name,
            'subject'=>'Your Order is Completed',
            'url_description' => 'Your Order is Completed',
            'body'=>'',
        ];
        $data['body'] ="Dear <b>".$order->user->name."</b>,<br>

            <h6>Thank you for your recent order. <br>Your order number is #{{$order->cart_order_id}}. <br>Has Been  Completed.<br>

           

            If you have any questions, please don't hesitate to contact our customer service team at [Customer Service Contact Information].</h6>";
            Notification::create([
                    'user_id' => $order->user_id,
                    'user_type' => 'Client',
                    'message' => 'Your Order Has Been Completed,Thank you for your recent order',
                    'message_type' => 'order',
                    'status'=> 'false'
                ]);

        Mail::to($order->user->email)->queue(new NotificationMaller($data));
        }elseif ($order->status=="Confirmed") {
        $delivery=Delivery::find(Auth::user()->city);
        $transaction=Transaction::where('cart_order_id',$order->cart_order_id)->first();
        $carts=Cart::with('product')->where('cart_order_id',$order->cart_order_id)->get();
                 $prices=[];
                 $order_details=[];
                 $order_details[]="<table style='border: 1px solid;'><tr style='border: 1px solid;'><td style='border: 1px solid;'>Product Name </td><td style='border: 1px solid;'>Qty</td><td style='border: 1px solid;'>Price</td></tr>";
                    foreach ($carts as $cart) {
                        $order_details[]="<tr style='border: 1px solid;'><td style='border: 1px solid;'>".$cart->product->name." </td><td style='border: 1px solid;'>".$cart->qty."</td><td style='border: 1px solid;'>".$cart->price."</td></tr>";

                        $prices[]=$cart->qty*$cart->price;
                    }
                     $order_details[]="<tr style='border: 1px solid;'><td colspan='2' style='border: 1px solid;'>Sub-Total </td><td style='border: 1px solid;'>".number_format(array_sum($prices),2)."</td></tr>";
                     $order_details[]="<tr style='border: 1px solid;'><td colspan='2' style='border: 1px solid;'>Delivery Fee </td><td style='border: 1px solid;'>".number_format($delivery->price,2)."</td></tr>";
                     $order_details[]="<tr style='border: 1px solid;'><td colspan='2' style='border: 1px solid;'>Total</td><td style='border: 1px solid;'>".number_format(number_format($delivery->price,2)+number_format(array_sum($prices),2),2)."</td></tr>";
                     $order_details[]="</table>";
  $data = [
            'name' =>Auth::user()->name,
            'subject'=>'Your Order is Confirmed',
            'url_description' => 'Your Order is Confirmed',
            'body'=>'',
        ];
        $data['body'] ="Dear <b>".Auth::user()->name."</b>,<br>

            <h6>Thank you for your recent order. <br>Your order number is #{{$transaction->cart_order_id}}. <br>We've received your order and it's currently being processed.<br>

            You'll receive another email with shipping information once your order has been shipped.<br>

            If you have any questions, please don't hesitate to contact our customer service team at [Customer Service Contact Information].</h6>";
            Notification::create([
                    'user_id' => $order->user_id,
                    'user_type' => 'Client',
                    'message' => 'Your Order is Confirmed',
                    'message_type' => 'order',
                    'status'=> 'false'
                ]);
            Notification::create([
                    'user_type' => 'Admin',
                    'message' => 'New Order from '.$order->user->name.'',
                    'message_type' => 'order',
                    'status'=> 'false'
                ]);

Mail::to(Auth::user()->email)->queue(new NotificationMaller($data));
$settings=Setting::first();
if ($settings->admin_email!==null) {
  $data = [
            'name' =>Auth::user()->name,
            'subject'=>'New Order is Confirmed',
            'url_description' => 'New Order is Confirmed',
            'body'=>'',
        ];
        $data['body'] ="Hi Admin,<br>

A new order has been placed on ".$transaction->update_at.".
<br>

Order Details:

Order Number: #".$transaction->cart_order_id."
<br>
Customer Name: ".Auth::user()->name."
<br>
Shipping Address: ".Auth::user()->address.", ".$delivery->location.",".Auth::user()->country."<br>
Items Ordered: <br>".implode("", $order_details)."<br>
Total Amount: NGN ".number_format(number_format($delivery->price,2)+number_format(array_sum($prices),2),2)."
Please review the order details and ensure everything is correct. If you need to make any changes, please contact the customer at ".Auth::user()->email." or ".Auth::user()->phone."

Once you've confirmed the order, please proceed with processing and shipping.

Thank you,";

Mail::to($settings->admin_email)->queue(new NotificationMaller($data));
}
        
    }
}

   
}