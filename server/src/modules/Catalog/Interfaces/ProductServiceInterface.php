<?php

namespace Modules\Catalog\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Catalog\DTOs\CategoriesDto;
use Modules\Catalog\DTOs\ProductsDto;
use Modules\Catalog\Models\Category;
use Modules\Catalog\Models\Product;

interface ProductServiceInterface
{
    public function store(ProductsDto $dto): Model|Builder;

    public function update(ProductsDto $dto): int;

    public function delete(string $key): ?bool;
}
