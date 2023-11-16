<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateDateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "createdAt" => 'date_format:"d/m/Y"',
        ];
    }

    public function messages(): array
    {
        return [
            "createdAt" => "A data informada está inválida!"
        ];
    }
}
