<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
