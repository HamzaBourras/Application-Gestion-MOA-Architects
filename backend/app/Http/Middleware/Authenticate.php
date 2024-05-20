<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;

use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticate 
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('sanctum')->check()) {
            return response()->json(['error' => 'Not authentified'], 401);
        }

        return $next($request);
    }
}