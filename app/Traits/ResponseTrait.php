<?php 
namespace App\Traits;

trait ResponseTrait {

    public function successResponse($message = NULL, $data = [], $statusCode = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    public function errorResponse($message = NULL, $data = [], $statusCode = 422)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }
}