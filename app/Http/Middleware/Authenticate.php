<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
                           // Store the current page URL in the session
            session()->put('last_visited_page', URL::previous());

            // Retrieve the last visited page URL
           
           
        return $request->expectsJson() ? null : route('sign_in');
    }
}
