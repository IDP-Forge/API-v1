<?php

namespace App\Domain\Http\Actions\API\v1\Organization\Listing;

use Illuminate\Pagination\LengthAwarePaginator;
use App\Domain\Http\DTO\Organization\ListOrganizationParams;

class Listing
{
    protected LengthAwarePaginator $result;

    public function execute(ListOrganizationParams $dto): self
    {
        $this->result = (new ListingPipeline)->execute($dto);

        return $this;
    }

    public function getResult(): LengthAwarePaginator
    {
        return $this->result;
    }
}
