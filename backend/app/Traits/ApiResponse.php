<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse {
    public function successResponse($data = null, string $message = 'Operación existosa', int $statusCode = 200): JsonResponse {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }

    public function errorResponse($data = null, string $message, int $statusCode = 200): JsonResponse {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }
}