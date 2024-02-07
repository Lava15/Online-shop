<?php

namespace App\Http\Resources\V1;

use App\Domain\Client\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     * @property-read Cart $resource
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->getKey(),
            'product_id' => $this->resource->product_id,
            'variant_id' => $this->resource->variant_id,
            'quantity' => $this->resource->quantity,
        ];
    }
}
