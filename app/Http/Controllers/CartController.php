<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function checkout(Request $request)
    {
         $user_id=Auth::user()->id;
        
       $deliveris=Delivery::all();  
       $carts=Cart::with('product')->where('user_id',$user_id)->where('status','In Cart')->get();
       return view('pages.cart',compact('carts','deliveris'))->with(['page_title'=>'Checkout']);
    }
    public function add_to_cart(Request $request)
    {   
        if (!Auth::check()) {
            if (session('guest_id')==null) {
                $user_id=time();
                session()->regenerate();
                session()->put('guest_id', $user_id);
            }else{
                $user_id=session('guest_id');
            }
           
         $add_item=New Cart();
        $add_item->product_id=$request->id;
        $add_item->qty=$request->qty;
        $add_item->unit=$request->unit;
        $add_item->price=str_ireplace(".00",''str_ireplace(",", "", $request->price));
        $add_item->status="In Cart";
        $add_item->user_type="Guest";
        $add_item->cart_order_id=time();
        $add_item->user_id=$user_id;
        $add_item->save();
        

        $carts=Cart::with('product')->where('user_id',$user_id)->where('status','In Cart')->get();
        $prices=[];
        foreach ($carts as $cart) {
            $prices[]=$cart->qty*$cart->price;
        }

        
        $cart_details = view('pages.components.cart_details', compact( 'carts'))->render();
        return (['cart_details' => $cart_details,'total_price'=>number_format(array_sum($prices),2)]);
        }else{
            $user_id=Auth::user()->id;
            $add_item=New Cart();
            $add_item->product_id=$request->id;
            $add_item->qty=$request->qty;
            $add_item->unit=$request->unit;
            $add_item->price=str_ireplace(",", "", $request->price);
            $add_item->status="In Cart";
            $add_item->user_type="Guest";
            $add_item->cart_order_id=time();
            $add_item->user_id=$user_id;
            $add_item->save();
        

        $carts=Cart::with('product')->where('user_id',$user_id)->where('status','In Cart')->get();
        $prices=[];
        foreach ($carts as $cart) {
            $prices[]=$cart->qty*str_ireplace(",", "", $cart->price);
        }

        
        $cart_details = view('pages.components.cart_details', compact( 'carts'))->render();
        return (['cart_details' => $cart_details,'total_price'=>number_format(array_sum($prices),2)]);
    }
    }
    public function get_cart_items(Request $request)
    {
         if (!Auth::check()) {
            if (session('guest_id')==null) {
                $user_id=time();
                session()->regenerate();
                session()->put('guest_id', $user_id);
            }else{
                $user_id=session('guest_id');
            }
           
        
        

        $carts=Cart::with('product')->where('user_id',$user_id)->where('status','In Cart')->get();
        $prices=[];
        foreach ($carts as $cart) {
            $prices[]=$cart->qty*$cart->price;
        }

        
        $cart_details = view('pages.components.cart_details', compact( 'carts'))->render();
        return (['cart_details' => $cart_details,'total_price'=>number_format(array_sum($prices),2)]);
        }else{
        $user_id=Auth::user()->id;
        

        $carts=Cart::with('product')->where('user_id',$user_id)->where('status','In Cart')->get();
        $prices=[];
        foreach ($carts as $cart) {
            $prices[]=$cart->qty*$cart->price;
        }

        
        $cart_details = view('pages.components.cart_details', compact( 'carts'))->render();
        return (['cart_details' => $cart_details,'total_price'=>number_format(array_sum($prices),2)]);
    }
    }

     public function count_cart_item(Request $request)
    {
         if (!Auth::check()) {
            if (session('guest_id')==null) {
                $user_id=time();
                session()->regenerate();
                session()->put('guest_id', $user_id);
            }else{
                $user_id=session('guest_id');
            }
           
        
        

        $carts=Cart::with('product')->where('user_id',$user_id)->where('status','In Cart')->get();
        return (['count_cart_item' => count($carts)]);
        }else{
        $user_id=Auth::user()->id;
        

       $carts=Cart::with('product')->where('user_id',$user_id)->where('status','In Cart')->get();
        return (['count_cart_item' => count($carts)]);
    }
    }


public function add_qty(Request $request)
    {
         if (!Auth::check()) {
            if (session('guest_id')==null) {
                $user_id=time();
                session()->regenerate();
                session()->put('guest_id', $user_id);
            }else{
                $user_id=session('guest_id');
            }
           
        
        Cart::where('id',$request->id)->update(['qty'=>$request->qty]);

        $carts=Cart::with('product')->where('user_id',$user_id)->where('status','In Cart')->get();
        $prices=[];
        foreach ($carts as $cart) {
            $prices[]=$cart->qty*$cart->price;
        }

        
        $cart_details = view('pages.components.cart_details', compact( 'carts'))->render();
        return (['cart_details' => $cart_details,'total_price'=>number_format(array_sum($prices),2)]);
        }else{
        $user_id=Auth::user()->id;
        Cart::where('id',$request->id)->update(['qty'=>$request->qty]);

        $carts=Cart::with('product')->where('user_id',$user_id)->where('status','In Cart')->get();
        $prices=[];
        foreach ($carts as $cart) {
            $prices[]=$cart->qty*$cart->price;
        }

        
        $cart_details = view('pages.components.cart_details', compact( 'carts'))->render();
        return (['cart_details' => $cart_details,'total_price'=>number_format(array_sum($prices),2)]);
    }
    }

   



    public function delete_cart_item(Request $request)
    {
        if (!Auth::check()) {
            if (session('guest_id')==null) {
                $user_id=time();
                session()->regenerate();
                session()->put('guest_id', $user_id);
            }else{
                $user_id=session('guest_id');
            }
           
        
        
        Cart::where('id',$request->id)->delete();
        $carts=Cart::with('product')->where('user_id',$user_id)->where('status','In Cart')->get();
        $prices=[];
        foreach ($carts as $cart) {
            $prices[]=$cart->qty*$cart->price;
        }

        
        $cart_details = view('pages.components.cart_details', compact( 'carts'))->render();
        return (['cart_details' => $cart_details,'total_price'=>number_format(array_sum($prices),2)]);
        }else{
        $user_id=Auth::user()->id;
        
        Cart::where('id',$request->id)->delete();
        $carts=Cart::with('product')->where('user_id',$user_id)->where('status','In Cart')->get();
        $prices=[];
        foreach ($carts as $cart) {
            $prices[]=$cart->qty*$cart->price;
        }

        
        $cart_details = view('pages.components.cart_details', compact( 'carts'))->render();
        return (['cart_details' => $cart_details,'total_price'=>number_format(array_sum($prices),2)]);
    }
    }
}
