<?php

namespace App\Http\Requests\Cart;

use App\Http\Requests\ApiRequest;

class StoreCartRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_id' => 'required|string|exists:products,id',
            'quantity' => 'required|numeric|min:1'
        ];
    }
}
