<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StudentMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard()->check() || Auth::user()?->role !== 'student') {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
