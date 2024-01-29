<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            if (\Illuminate\Support\Facades\Request::is( '/customer/dashboard')) {
                return route('selection');
            }

            else {
                return route('selection');
            }
        }
        else{
            return route('selection');
        }
    }
}
