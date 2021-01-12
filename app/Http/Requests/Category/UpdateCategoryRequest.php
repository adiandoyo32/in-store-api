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
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:191',
            'description' => 'string|max:191|nullable'
        ];
    }
}
