<?php

namespace App\Http\Requests\API\v1\Organization;

use Illuminate\Foundation\Http\FormRequest;
use App\Domain\Http\DTO\Organization\ListAccountsParams;
use App\Domain\Http\DTO\Organization\ListPermissionsParams;
use App\Domain\Http\DTO\Organization\ListOrganizationParams;

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

    public function getListingDTO(): ListOrganizationParams
    {
        return new ListOrganizationParams(
            $this->input('title'),
            $this->input('sortWay'),
            $this->input('limit', 10),
            $this->input('active'),
            $this->input('sortBy')
        );
    }

    public function getListAccountsDTO(): ListAccountsParams
    {
        return new ListAccountsParams(
            $this->input('title'),
            $this->input('sortWay'),
            $this->input('limit', 10),
            $this->input('offset', 0),
            $this->input('sortBy')
        );
    }

    public function getListOrganizationPermissionsDTO(): ListPermissionsParams
    {
        return new ListPermissionsParams(
            $this->input('filter'),
            $this->input('limit'),
            $this->input('page')
        );
    }
}
