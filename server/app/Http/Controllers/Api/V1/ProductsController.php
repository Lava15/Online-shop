<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\ProductRequest;
use App\Http\Resources\V1\ProductsResource;
use App\Http\Responses\Api\V1\CollectionResponse;
use App\Http\Responses\Api\V1\MessageResponse;
use App\Http\Responses\Api\V1\SingleRecordResponse;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Request;
use Modules\Catalog\DTOs\ProductsDto;
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

    public function store(ProductRequest $request): Responsable
    {
        $this->productService->store(
            dto: ProductsDto::fromApiRequest($request)
        );

        return new MessageResponse(
            message: 'Product created successfully',
            status: Response::HTTP_OK
        );
    }

    public function update(): Responsable
    {

        return new MessageResponse(
            message: 'Product updated successfully',
            status: Response::HTTP_ACCEPTED
        );
    }

    public function delete(string $key): Responsable
    {
        $this->productService->delete(
            key: $key
        );
        return new MessageResponse(
            message: 'Product deleted',
            status: Response::HTTP_NO_CONTENT
        );
    }
}
