<?php

namespace App\Http\Controllers\Api\v1\Error;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function failedValidation($validator)
    {
        dd($validator);
    }
}
