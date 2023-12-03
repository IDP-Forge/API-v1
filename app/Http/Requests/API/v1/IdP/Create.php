<?php

namespace App\Http\Requests\API\v1\IdP;

use App\Domain\Http\DTO\IdP\CreateIdPDTO;
use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type_id' => 'required',
            'title' => 'required|max:255',
            'description' => 'required|max:255'
        ];
    }

    public function getDTO(): CreateIdPDTO
    {
        return new CreateIdPDTO(
            (int)$this->input('type_id'),
            (bool)$this->input('is_default'),
            $this->input('title'),
            $this->input('description', ''),
            []
        );
    }
}
