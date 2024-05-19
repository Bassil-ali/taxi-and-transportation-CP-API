<?php

namespace App\Http\Middleware;

use App\Helpers\Messages;
use Closure;
use Illuminate\Http\Request;

class VerfiedUserApi
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
        if($request->expectsJson() && $request->user()){
            if( ! $request->user()->email_verified_at){
                return   response()->json([
                    'status' => 'false' ,
                    'message' => Messages::getMessage('NOT_VERIFIED'),
                    ]  , 403);
            }


        }
        return $next($request);
    }
}
