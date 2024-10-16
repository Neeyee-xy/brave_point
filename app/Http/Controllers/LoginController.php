<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{

    public function sign_in(Request $request)
    {
                if (!Auth::check()) {
               return view('pages.auth.sign_in');
           }else{
            return redirect('/dashboard'); 
           }
    }
    public function sign_in_user(Request $request)
    {
        $rules = [

            
            'email' => ['required','email'],
            'password'    => ['required'],
        
        ];


        $customMessages = [
            'category.required' => 'The category field is required.',
            ];

        $validate= $this->validate($request, $rules, $customMessages);
         if ($validate) {
            // dd(Auth::attempt($validate));
            if (Auth::attempt($validate)) {
                if (session('guest_id')!==null) {
                    $carts=Cart::where('user_id',session('guest_id'))->get();
                    if (count($carts)>0) {
                        Cart::where('user_id',session('guest_id'))->update(['user_id'=>Auth::user()->id]);
                    }
                
            }
                    $lastVisitedPage = session()->get('last_visited_page');
           
                 return (['success' => 'Sign in Successfull, Redirecting..!!!','lastVisitedPage'=>$lastVisitedPage]);

            }else{
                 return (['errors' => 'Something went wrong,Try again']);
            }

         }else{
             return $this->validate($request, $rules, $customMessages);
         }
    }


    public function sign_out(Request $request)
    {
        Auth::logout();
        session()->invalidate();

        session()->regenerateToken();

        return redirect('/auth/sign_in');
    }


    
}
