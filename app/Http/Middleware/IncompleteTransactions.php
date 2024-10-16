<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Enums\UserType;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IncompleteTransactions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (isset(Auth::user()->id)) {
            // code...
        
        $transactions=Transaction::where('user_id',Auth::user()->id)->where('status','In-Progress')->first();
        // dd($transactions);
         if ($transactions) {
            return redirect("/verify_payment?ref=".$transactions->cart_order_id."&order_id=".$transactions->cart_order_id."");
        }
    }
         

        return $next($request);
    }
}
