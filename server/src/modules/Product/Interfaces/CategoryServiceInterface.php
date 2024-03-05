<?php

namespace Modules\Product\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\DTOs\CategoriesDto;
use Modules\Product\Models\Category;

interface CategoryServiceInterface
{
    public function store(CategoriesDto $dto): Model|Builder;

    public function update(CategoriesDto $dto): int;

    public function delete(Category $category): ?bool;
}
