<?php

namespace App\Http\Middleware;

use App\Helpers\Messages;
use Closure;
use Illuminate\Http\Request;

class CheckUserActivation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if ($request->expectsJson() && $request->user()) {

            if(  $request->user()->status != 1 ){
                return   response()->json([
                    'status' => 'false',
                    'message' => Messages::getMessage('SUSPEND_ACCOUT'),

                ], 403) ;
            }

        }
        return $next($request);
    }
}
