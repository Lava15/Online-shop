<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Product\Models\Product;

class ProductResource extends JsonResource
{
    /**
     * @property-read Product $resource
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->getKey(),
            'type' => 'product',
            'private' => false,
            'attributes' => [
                'category_id' => $this->resource->category_id,
                'key' => $this->resource->key,
                'title' => $this->resource->title,
                'sku' => $this->resource->sku,
                'slug' => $this->resource->slug,
                'description' => $this->resource->description,
                'thumb_image' => $this->resource->thumb_image,
                'price' => $this->resource->price,
                'retail_price' => $this->resource->retail_price,
                'quantity' => $this->resource->quantity,
                'status' => $this->resource->status,
            ],
            'relationships' => [
                'category' => CategoryResource::make(
                    $this->whenLoaded('category')
                ),
            ],
        ];
    }
}
