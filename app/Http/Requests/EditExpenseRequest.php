<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditExpenseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "value" => "string|required",
            "description" => "string|required",
            "createdAt" => 'required|date_format:"d/m/Y"',
            "IdUserData" => "required",
            "userId" => "required"
        ];
    }

    public function messages(): array
    {
        return [
            "createdAt" => "A data informada está inválida!"
        ];
    }
}
