<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'parent_id' => ['nullable', 'integer'],
            'name' => ['required','array', 'max:100'],
            'description' => [ 'required','array', 'max:255'],
            'slug' => ['required','string', 'max:255'],
            'image' => ['nullable', 'image'],
            'is_active' => ['boolean'],
            'order' => ['integer'],
        ];
    }
}
