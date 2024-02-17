<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\CategoriesResource;
use App\Http\Responses\Api\V1\CollectionResponse;
use Illuminate\Contracts\Support\Responsable;
use Modules\Catalog\Models\Category;
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
