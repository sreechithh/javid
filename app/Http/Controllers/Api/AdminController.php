<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\Auth;

class AdminController
{
    use ResponseTrait;

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (!Auth::guard('admin')->attempt($credentials)) {
            return $this->errorResponse(['error' => 'Unauthorized'], [], 401);
        }

        $token = Auth::guard('admin')->user()['api_token'];
        return $this->successResponse(
            "Login Successfully", 
            ['access_token' => $token, 'token_type' => 'bearer']
        );
    }
   
}
