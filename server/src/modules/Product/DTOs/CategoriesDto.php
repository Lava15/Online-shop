<?php

declare(strict_types=1);

namespace Modules\Product\DTOs;

use App\Http\Requests\V1\CategoryRequest;

final readonly class CategoriesDto
{
    public function __construct(
        public ?int $parentId,
        public array|string $name,
        public array|string $description,
        public string $slug,
        public mixed $image,
        public bool $isActive,
        public int $order,
    ) {
    }

    public static function fromApiRequest(CategoryRequest $request)
    {
        return new self(
            parentId: $request->validated('parent_id'),
            name: $request->validated('name'),
            description: $request->validated('description'),
            slug: $request->validated('slug'),
            image: $request->validated('image'),
            isActive: $request->validated('is_active'),
            order: $request->validated('order'),
        );
    }
}
