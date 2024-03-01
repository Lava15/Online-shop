<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Client\Models\Cart;

class CartResource extends JsonResource
{
    /**
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
