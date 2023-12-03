<?php

namespace App\Http\Requests\API\v1\Organization;

use Illuminate\Foundation\Http\FormRequest;
use App\Domain\Http\DTO\Organization\CreatePermissionParams;

class CreatePermission extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255'
        ];
    }

    public function getDTO(): CreatePermissionParams
    {
        return new CreatePermissionParams(
            (bool)$this->input('protected', false),
            $this->input('title'),
            $this->input('slug'),
            $this->input('description')
        );
    }
}
