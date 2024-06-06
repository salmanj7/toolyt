<?php

namespace App\Concerns;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

trait ApiResponse
{
    /**
     * @return JsonResponse
     */
    public function noContent(): JsonResponse
    {
        return $this->toApiResponse(true, trans('success'), [], 204);
    }

    /**
     * @param bool $status
     * @param string $message
     * @param array | \JsonSerializable | Arrayable $content
     * @param int $statusCode
     * @return JsonResponse
     */
    private function toApiResponse(bool $status = true, string $message = 'no-content', null|array|\JsonSerializable|Arrayable $content = null, int $statusCode = 200): JsonResponse
    {
        return Response::json([
            'success' => $status,
            'message' => $message,
            'data' => $content
        ])
            ->setStatusCode($statusCode);
    }

    /**
     * @param string $message
     * @param array | \JsonSerializable | Arrayable $content
     * @param int $statusCode
     * @return JsonResponse
     */
    public function successResponse(string $message = 'success', null|array|\JsonSerializable|Arrayable $content = null, int $statusCode = 200): JsonResponse
    {
        return $this->toApiResponse(true, $message, $content, $statusCode);
    }

    /**
     * @param string $message
     * @param array|\JsonSerializable|Arrayable|null $content
     * @param int $statusCode
     * @return JsonResponse
     */
    public function errorResponse(string $message = 'Error', null|array|\JsonSerializable|Arrayable $content = null, int $statusCode = 200): JsonResponse
    {
        return $this->toApiResponse(false, $message, $content, $statusCode);
    }
}
