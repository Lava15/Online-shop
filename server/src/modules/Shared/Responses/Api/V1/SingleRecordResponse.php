<?php

namespace Modules\Shared\Responses\Api\V1;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class SingleRecordResponse implements Responsable
{
    public function __construct(
        private readonly mixed $data,
        private int|Response $status = Response::HTTP_OK,
    ) {
    }

    public function toResponse($request): JsonResponse
    {
        return new JsonResponse(
            data: $this->data,
            status: $this->status,
        );
    }
}
