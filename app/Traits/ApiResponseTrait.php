<?php

// app/Traits/ApiResponseTrait.php
namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    /**
     * Generate a successful API response.
     *
     * @param object $data
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public function successResponse(object $data, string $message = 'Success', int $code = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $code);
    }

    /**
     * Generate an API error response.
     *
     * @param string $message
     * @param array $errors
     * @param int $code
     * @return JsonResponse
     */
    public function errorResponse(string $message = 'Error', array $errors = [], int $code = 400): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors
        ], $code);
    }
}

