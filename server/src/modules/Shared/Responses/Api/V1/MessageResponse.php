<?php

namespace Modules\Shared\Responses\Api\V1;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class MessageResponse implements Responsable
{
    public function __construct(
        private readonly string $message,
        private int|Response $status = Response::HTTP_OK
    ) {
    }

    public function toResponse($request): JsonResponse
    {
        return new JsonResponse(
            data: $this->message,
            status: $this->status,
        );
    }
}
