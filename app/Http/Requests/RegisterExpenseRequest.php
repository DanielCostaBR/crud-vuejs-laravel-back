<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterExpenseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "value" => "string|required",
            "description" => "string|required",
            "createdAt" => 'required|date_format:"d/m/Y"',
            "token" => "string|required"
        ];
    }

    public function messages(): array
    {
        return [
            "createdAt" => "A data informada está inválida!"
        ];
    }
}
