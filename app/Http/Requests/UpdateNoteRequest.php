<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNoteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'description' => ['required'],
            'image_url' => ['mimes:jpg,png'],
        ];
    }
}
