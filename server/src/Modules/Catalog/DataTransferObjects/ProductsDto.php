<?php

declare(strict_types=1);

namespace Modules\Catalog\DataTransferObjects;

use App\Http\Requests\V1\CategoryRequest;
use App\Models\User;
use Modules\Catalog\Enums\ProductStatus;

final readonly class ProductsDto
{
    public function __construct(
        public null|int      $categoryId,
        public User          $createdBy,
        public User          $updatedBy,
        public User          $deletedBy,
        public string        $key,
        public array|string  $title,
        public array|string  $description,
        public string        $sku,
        public string        $slug,
        public int           $price,
        public int           $retailPrice,
        public int           $salePrice,
        public int           $quantity,
        public bool          $isActive,
        public ProductStatus $status,
    )
    {
    }

    public static function fromApiRequest(CategoryRequest $request)
    {
        return new self (
        //
        );
    }
}
