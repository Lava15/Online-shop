<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Domain\Catalog\Models\Category;
use App\Http\Resources\V1\CategoriesResource;
use App\Http\Responses\CollectionResponse;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends Controller
{
    /**
     * @return Responsable
     */
    public function index(): Responsable
    {
        return new CollectionResponse(
            data: CategoriesResource::collection(
                Category::query()->paginate(5)
            ),
            status: Response::HTTP_OK
        );


    }
}
