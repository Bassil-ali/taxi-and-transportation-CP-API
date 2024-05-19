<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ApiManageLanguage
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->header('lang')) {

            $request->header('lang') ==  'en' ? app()->setLocale('en') : app()->setLocale('ar');
        }

        return $next($request);

    }//end of handle

}//end of class