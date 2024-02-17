<?php

namespace App\Http\Responses\Api\V1;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ErrorResponse implements Responsable
{
    public function __construct(
        private readonly Throwable    $e,
        private readonly string       $message,
        private readonly array        $headers = [],
        private readonly int|Response $status = Response::HTTP_INTERNAL_SERVER_ERROR
    )
    {
    }

    /**
     * @return JsonResponse
     */
    public function toResponse($request): JsonResponse
    {
        $response = ['message' => $this->message];

        if ($this->e && config('app.debug')) {
            $response['debug'] = [
                'message' => $this->e->getMessage(),
                'file' => $this->e->getFile(),
                'line' => $this->e->getLine(),
                'trace' => $this->e->getTraceAsString(),
            ];
        }

        return new JsonResponse(
            data: $response,
            status: $this->status,
            headers: $this->headers,
        );
    }
}
