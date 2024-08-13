<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MyAppMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // echo "My Middleware Testing";
        // $data = $request->password;
        // echo $data;
        // if($request->password != 12345678){
        //     echo 'Invalid User';
        //     die;
        // } else {
        //     return $next($request);
        // }
        // return $next($request);

        if(session()->has('email')){
            return $next($request);
        } else{
            return redirect()->route('admin.login');
        }
    }
}
