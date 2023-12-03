<?php

namespace App\Http\Requests\API\v1\Applications;

use Illuminate\Foundation\Http\FormRequest;

class ReadTypes extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
