<?php

namespace App\Http\Middleware;

use App\Admin;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticated
{

    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();
    
        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        if (Admin::where('api_token', $token)->exists()) {
            return $next($request);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
