<?php

namespace Modules\Catalog\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Catalog\DataTransferObjects\CategoriesDto;
use Modules\Catalog\Models\Category;

interface CategoryServiceInterface
{
    public function store(CategoriesDto $dto): Model|Builder;

    public function update(CategoriesDto $dto): int;

    public function delete(Category $category): ?bool;
}
