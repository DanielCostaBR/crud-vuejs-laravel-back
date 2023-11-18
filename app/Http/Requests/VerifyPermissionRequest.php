<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyPermissionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "token" => "string|required"
        ];
    }

    public function messages(): array
    {
        return [];
    }
}
