<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Enums\UserType;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         if (!Auth::check()) {
            return redirect('/auth/sign_in');
        }
         if (\Auth::user()->user_type !== UserType::ADMIN->title()) {
             return redirect('/auth/sign_in');
        }

        return $next($request);
    }
}
