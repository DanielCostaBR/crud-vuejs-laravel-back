<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "email" => "string|required"
        ];
    }

    public function messages(): array
    {
        return [
            "email" => "E-mail inválido!"
        ];
    }
}
