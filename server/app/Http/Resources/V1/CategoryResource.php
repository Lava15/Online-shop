<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Product\Models\Category;
use Modules\Product\Models\Product;

class CategoryResource extends JsonResource
{
    /**
     * @property-read Category $resource
     * @property-read Product $product
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->getKey(),
            'type' => 'category',
            'private' => false,

            'attributes' => [
                'parent_id' => $this->resource->parent_id,
                'name' => $this->resource->name,
                'description' => $this->resource->description,
                'slug' => $this->resource->slug,
                'order' => $this->resource->order,
            ],
            'relationships' => [
                'products' => ProductResource::collection(
                    $this->whenLoaded('products')
                )
            ]
            //            'links' => [
            //                'first' => $this->url(1),
            //                'last' => $this->url($this->lastPage()),
            //                'prev' => $this->previousPageUrl(),
            //                'next' => $this->nextPageUrl(),
            //            ],
            //            'meta' => [
            //                'current_page' => $this->currentPage(),
            //                'from' => $this->firstItem(),
            //                'last_page' => $this->lastPage(),
            //                'path' => $this->path(),
            //                'per_page' => $this->perPage(),
            //                'to' => $this->lastItem(),
            //                'total' => $this->total(),
            //            ],

        ];
    }
}
