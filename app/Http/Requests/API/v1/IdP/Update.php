<?php

namespace App\Http\Requests\API\v1\IdP;

use App\Domain\Http\DTO\IdP\UpdateIdPDTO;
use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type_id' => 'required',
            'title' => 'required'
        ];
    }

    public function getDTO(): UpdateIdPDTO
    {
        return new UpdateIdPDTO(
            (int)$this->input('type_id'),
            (bool)$this->input('is_default'),
            $this->input('title'),
            $this->input('description', ''),
            []
        );
    }
}
