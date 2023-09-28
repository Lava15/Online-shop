<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class CollectionResponse implements Responsable
{
    public function __construct(
        private readonly ResourceCollection $data,
        private int|Response                $status = Response::HTTP_OK,
    )
    {
    }

    public function toResponse($request)
    {
        return new JsonResponse(
            data: $this->data,
            status: $this->status,
        );
    }
}
