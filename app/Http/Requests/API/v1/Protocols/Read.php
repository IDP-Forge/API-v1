<?php

namespace App\Http\Requests\API\v1\Protocols;

use Illuminate\Foundation\Http\FormRequest;

class Read extends FormRequest
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
