<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(empty(session('locale')))
        {
            App::setLocale('ar');
        }
        else{
            App::setLocale(session('locale'));
        }

        return $next($request);
    }
}
