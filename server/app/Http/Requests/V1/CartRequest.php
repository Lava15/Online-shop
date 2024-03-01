<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_id' => ['required', 'exists:products,id'],
            'variant_id' => ['exists:variants,id'],
            'quantity' => ['required', 'numeric', 'min:1'],
        ];
    }
}
