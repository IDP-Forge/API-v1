<?php

namespace App\Http\Requests\API\v1\Applications;

use Illuminate\Foundation\Http\FormRequest;
use App\Domain\Http\DTO\Application\CreateAppDTO;

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
            'protocol_id' => 'required',
            'title' => 'required'
        ];
    }

    public function getDTO(): CreateAppDTO
    {
        return new CreateAppDTO(
            (int)$this->input('protocol_id'),
            (bool)$this->input('active', false),
            $this->input('title'),
            $this->input('description'),
            $this->input('config', [])
        );
    }
}
