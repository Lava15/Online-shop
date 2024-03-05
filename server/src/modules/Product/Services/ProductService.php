<?php

namespace Modules\Product\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\DTOs\ProductsDto;
use Modules\Product\Interfaces\ProductServiceInterface;
use Modules\Product\Models\Product;

class ProductService implements ProductServiceInterface
{
    //
    #[\Override]
    public function store(ProductsDto $dto): Model|Builder
    {
        return Product::query()->create([
            'category_id' => $dto->categoryId,
            'created_by' => $dto->createdBy,
            'updated_by' => $dto->updatedBy,
            'deleted_by' => $dto->deletedBy,
            'sku' => $dto->sku,
            'title' => $dto->title,
            'slug' => $dto->slug,
            //            'thumb_image' => $dto->thumbImage,
            'description' => $dto->description,
            'price' => $dto->price,
            'retail_price' => $dto->retailPrice,
            'sale_price' => $dto->salePrice,
            'quantity' => $dto->quantity,
            'active' => $dto->active,
            'status' => $dto->status,
        ]);
    }

    #[\Override]
    public function update(ProductsDto $dto): int
    {
        return Product::query()->update([
            'category_id' => $dto->categoryId,
            'created_by' => $dto->createdBy,
            'updated_by' => $dto->updatedBy,
            'deleted_by' => $dto->deletedBy,
            'sku' => $dto->sku,
            'title' => $dto->title,
            'slug' => $dto->slug,
            //            'thumb_image' => $dto->thumbImage,
            'description' => $dto->description,
            'price' => $dto->price,
            'retail_price' => $dto->retailPrice,
            'sale_price' => $dto->salePrice,
            'quantity' => $dto->quantity,
            'active' => $dto->active,
            'status' => $dto->status,
        ]);
    }

    #[\Override]
    public function delete(string $key): ?bool
    {
        return Product::query()->where('key', $key)->delete();
    }
}
