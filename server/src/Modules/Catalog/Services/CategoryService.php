<?php

namespace Modules\Catalog\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Catalog\DataTransferObjects\CategoriesDto;
use Modules\Catalog\Interfaces\CategoryServiceInterface;
use Modules\Catalog\Models\Category;

class CategoryService implements CategoryServiceInterface
{

    #[\Override] public function store(CategoriesDto $dto): Model|Builder
    {
        return Category::query()->create([
            'parent_id' => $dto->parentId,
            'name' => $dto->name,
            'description' => $dto->description,
            'slug' => $dto->slug,
            'image' => $dto->image,
            'is_active' => $dto->isActive,
            'order' => $dto->order
        ]);
    }

    #[\Override] public function update(CategoriesDto $dto): int
    {
        return Category::query()->update([
            'parent_id' => $dto->parentId,
            'name' => $dto->name,
            'description' => $dto->description,
            'slug' => $dto->slug,
            'image' => $dto->image,
            'is_active' => $dto->isActive,
            'order' => $dto->order
        ]);
    }

    #[\Override] public function delete(Category $category): ?bool
    {
        return $category->delete();
    }
}
