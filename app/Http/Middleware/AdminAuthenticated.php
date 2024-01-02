<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\ResponseTrait;
use Tymon\JWTAuth\Facades\JWTAuth;
class AdminAuthenticated
{
    use ResponseTrait;

    public function handle($request, Closure $next)
    {
        if (JWTAuth::parseToken()->authenticate()) {            
            return $next($request);
        }

        return $this->errorResponse(['error' => 'Unauthorized'], [], 401);
    }
}
