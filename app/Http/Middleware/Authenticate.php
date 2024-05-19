<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {

            if (in_array('auth:admin', $request->route()->middleware())) {

                if (auth('admin')->check()) {

                    return redirect()->back();
                    // return redirect()->route('dashboard.admin.index');
                    
                } else {

                    return url('/');
                }

            }//end if if admin auth

            return url('/');

        }//end of if

    }//end of fun

}//emd of class