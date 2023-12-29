<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminController
{
    use ResponseTrait;
 
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {            
            return $this->successResponse(NULL, ['token' => Auth::guard('admin')->user()->api_token], 200);
        }
        return $this->errorResponse(['error' => 'Unauthorized'], NULL, 401);  
    }
   
}
