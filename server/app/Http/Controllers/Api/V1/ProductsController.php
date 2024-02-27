<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProductsResource;
use App\Http\Responses\Api\V1\CollectionResponse;
use App\Http\Responses\Api\V1\SingleRecordResponse;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Request;
use Modules\Catalog\Interfaces\ProductServiceInterface;
use Modules\Catalog\Models\Product;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller
{

    public function __construct(
        private readonly ProductServiceInterface $productService
    )
    {
    }

    /**
     * @return Responsable
     */
    public function index(): Responsable
    {
        return new CollectionResponse(
            data: ProductsResource::collection(
                Product::query()->paginate(5)
            ),
            status: Response::HTTP_OK
        );
    }

    public function show(Product $product): Responsable
    {
        return new SingleRecordResponse(
            data: ProductsResource::make($product),
            status: Response::HTTP_OK,
        );
    }

    public function store(): void
    {
        //
    }

    public function update(): void
    {
        //
    }

    public function delete(): void
    {
        //
    }
}
