<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Modules\Product\Enums\ProductStatus;

class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'category_id' => ['nullable', 'integer'],
            'created_by' => ['required'],
            'updated_by' => ['required'],
            'deleted_by' => ['required'],
            'sku' => ['required', 'string'],
            'title' => ['required', 'array'],
            'slug' => ['required', 'string'],
            //            'thumb_image' => ['nullable', 'image'],
            'description' => ['required', 'array'],
            'price' => ['required'],
            'retail_price' => ['required'],
            'sale_price' => ['required'],
            'quantity' => ['required'],
            'active' => ['required', 'boolean'],
            'status' => ['required', new Enum(ProductStatus::class)],
        ];
    }
}
