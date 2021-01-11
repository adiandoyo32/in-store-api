<?php

namespace App\Http\Requests;

use App\Http\Requests\ApiRequest;

class StoreCategoryRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:191',
            'description' => 'required|string|max:191|nullable'
        ];
    }    
}
