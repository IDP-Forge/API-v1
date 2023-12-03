<?php

namespace App\Domain\Http\Actions\API\v1\Organization\Listing;

use App\Models\Views\ViewOrganization;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Domain\Http\DTO\Organization\ListOrganizationParams;

class ListingState
{
    protected LengthAwarePaginator $result;
    protected ViewOrganization $view;

    public function __construct(
        public readonly ListOrganizationParams $params
    ){}

    public function setViewOrganization(ViewOrganization $model): void
    {
        $this->view = $model;
    }

    public function getViewOrganization(): ViewOrganization
    {
        return $this->view;
    }

    public function setResult(LengthAwarePaginator $result): void
    {
        $this->result = $result;
    }

    public function getResult(): LengthAwarePaginator
    {
        return $this->result;
    }
}
