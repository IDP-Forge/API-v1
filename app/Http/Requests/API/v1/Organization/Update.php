<?php

namespace App\Http\Requests\API\v1\Organization;

use Illuminate\Foundation\Http\FormRequest;
use App\Domain\Http\DTO\Organization\UpdateOrganizationParams;

class Update extends FormRequest
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
            'title' => 'string|required|max:255',
            'metadata' => 'sometimes|array'
        ];
    }

    public function getDTO(): UpdateOrganizationParams
    {
        return new UpdateOrganizationParams(
            $this->input('title'),
            $this->input('parent_id'),
            (bool)$this->input('active', false),
            $this->input('description'),
            $this->input('metadata', [])
        );
    }
}
