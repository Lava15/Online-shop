<?php

namespace App\Http\Resources\V1;

use App\Domain\Catalog\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     * @property-read Product $resource
     *
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->getKey(),
            'category' => $this->resource->category_id,
            'key' => $this->resource->key,
            'title' => $this->resource->title,
            'slug' => $this->resource->slug,
            'description' => $this->resource->description,
            'short_description' => $this->resource->short_description,
            'thumb_image' => $this->resource->thumb_image,
            'price' => $this->resource->price,
            'retail_price' => $this->resource->retail_price,
            'quantity' => $this->resource->quantity,
            'status' => $this->resource->status,
        ];
    }
}
