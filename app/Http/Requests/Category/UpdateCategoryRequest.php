<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\ApiRequest;

class UpdateCategoryRequest extends ApiRequest
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
            'description' => 'string|max:255|nullable'
        ];
    }  
}
