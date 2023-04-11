<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->utype === 'ADM')
        {
            return $next($request);
        }
        else
        {
            session()->flush();
            return redirect()->route('login');
        }
    }
}
