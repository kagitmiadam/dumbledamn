<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (Auth::guest()) {
            return route('get-homepage');
        }

        if (! $request->expectsJson()) {
            return route('/');
        }
    }
}
