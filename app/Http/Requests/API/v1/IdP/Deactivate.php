<?php

namespace App\Http\Requests\API\v1\IdP;

use Illuminate\Foundation\Http\FormRequest;

class Deactivate extends FormRequest
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
