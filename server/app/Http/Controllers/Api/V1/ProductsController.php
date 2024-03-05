<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\ProductRequest;
use App\Http\Resources\V1\ProductResource;
use Illuminate\Contracts\Support\Responsable;
use Modules\Product\DTOs\ProductsDto;
use Modules\Product\Interfaces\ProductServiceInterface;
use Modules\Product\Models\Product;
use Modules\Product\Queries\QueryProducts;
use Modules\Shared\Responses\Api\V1\CollectionResponse;
use Modules\Shared\Responses\Api\V1\MessageResponse;
use Modules\Shared\Responses\Api\V1\SingleRecordResponse;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller
{
    public function __construct(
        private readonly ProductServiceInterface $productService,
        private readonly QueryProducts           $queryProducts
    )
    {
    }

    public function index(): Responsable
    {
        return new CollectionResponse(
            data: ProductResource::collection(
                $this->queryProducts->handle(['category'])->paginate(25)
            ),
            status: Response::HTTP_OK
        );
    }

    public function show(Product $product): Responsable
    {
        return new SingleRecordResponse(
            data: ProductResource::make($product),
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

    public function update(string $key, ProductRequest $request): Responsable
    {
        $product = Product::query()->where('key', $key)->first();
        $product->update($request->validated());

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
