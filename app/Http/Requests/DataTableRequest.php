<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataTableRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "token" => "string|required"
        ];
    }
}
