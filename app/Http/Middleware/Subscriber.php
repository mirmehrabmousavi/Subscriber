<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Subscriber
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->subscribe >= now()->format('Y-m-d')) {
            return $next($request);
        }else{
            return redirect(route('plans'))->with('danger', 'You are not Premium User, Please Upgrade Your Plan');
        }
    }
}
