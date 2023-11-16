<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "email" => "email|required",
            "name" => "string|required",
            "password" => "string|required",
            "confirmPassword" => "string|required"
        ];
    }
}
