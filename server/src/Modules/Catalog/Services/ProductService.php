<?php

namespace Modules\Catalog\Services;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Catalog\DataTransferObjects\ProductsDto;
use Modules\Catalog\Interfaces\ProductServiceInterface;
use Modules\Catalog\Models\Product;

class ProductService implements ProductServiceInterface
{
    //
    #[\Override] public function store(ProductsDto $dto): Model|Builder
    {
        // TODO: Implement store() method.
    }

    #[\Override] public function update(ProductsDto $dto): int
    {
        // TODO: Implement update() method.
    }

    #[\Override] public function delete(Product $category): ?bool
    {
        // TODO: Implement delete() method.
    }
}
