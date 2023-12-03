<?php

namespace App\Http\Requests\API\v1\Organization;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;
use App\Domain\Http\DTO\Organization\CreateOrganizationParams;

class Create extends FormRequest
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
            'title' => 'required|string|max:255'
        ];
    }

    public function getDTO(): CreateOrganizationParams
    {
        return new CreateOrganizationParams(
            $this->input('title'),
            $this->input('parent_id'),
            (bool)$this->input('active', false),
            $this->input('description'),
            Str::random(64),
            Str::random(32)
        );
    }
}
