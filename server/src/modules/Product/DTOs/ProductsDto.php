<?php

declare(strict_types=1);

namespace Modules\Product\DTOs;

use App\Http\Requests\V1\ProductRequest;

final readonly class ProductsDto
{
    public function __construct(
        public ?int $categoryId,
        public int $createdBy,
        public int $updatedBy,
        public int $deletedBy,
        public array|string $title,
        public array|string $description,
        public string $sku,
        public string $slug,
        //        public string        $thumbImage,
        public int $price,
        public int $retailPrice,
        public int $salePrice,
        public int $quantity,
        public bool $active,
        public mixed $status,
    ) {
    }

    public static function fromApiRequest(ProductRequest $request): self
    {
        return new self(
            categoryId: $request->validated('category_id'),
            createdBy: $request->validated('created_by'),
            updatedBy: $request->validated('updated_by'),
            deletedBy: $request->validated('deleted_by'),
            title: $request->validated('title'),
            description: $request->validated('description'),
            sku: $request->validated('sku'),
            slug: $request->validated('slug'),
            //            thumbImage: $request->validated('thumb_image'),
            price: $request->validated('price'),
            retailPrice: $request->validated('retail_price'),
            salePrice: $request->validated('sale_price'),
            quantity: $request->validated('quantity'),
            active: $request->validated('active'),
            status: $request->validated('status'),
        );
    }
}
