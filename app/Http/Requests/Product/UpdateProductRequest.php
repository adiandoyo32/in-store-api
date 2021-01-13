<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\ApiRequest;

class UpdateProductRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'category_id' => 'required|numeric',
            'description' => 'string|max:255|nullable',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'image' => 'required|string',
        ];
    }
}
