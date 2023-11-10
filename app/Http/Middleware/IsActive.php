<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::user()->is_active){
            Auth::logout();
            $request->session()->flush();
            return redirect(route("login"))->with(["message" => "ログインを許可されていません"]);
        }
        return $next($request);
    }
}
