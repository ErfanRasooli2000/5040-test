<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check())
        {
            $user = auth()->user();
            if($user->admin)
            {
                return $next($request);
            }
            else
            {
                return redirect(route('auth.admin'));
            }
        }
        return redirect(route('login'));
    }
}
