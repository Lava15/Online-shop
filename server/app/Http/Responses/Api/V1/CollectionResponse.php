<?php

namespace App\Http\Responses\Api\V1;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\Response;

class CollectionResponse implements Responsable
{

    public function __construct(
        private readonly ResourceCollection $data,
        private int|Response                $status = Response::HTTP_OK,
    )
    {
    }

    /**
     * @param $request
     * @return JsonResponse
     */
    public function toResponse($request): JsonResponse
    {
        return new JsonResponse(
            data: $this->data,
            status: $this->status,
        );
    }
}
