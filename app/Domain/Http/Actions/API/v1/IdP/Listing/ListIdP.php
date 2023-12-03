<?php

namespace App\Domain\Http\Actions\API\v1\IdP\Listing;

use App\Models\Views\ViewIdentityProvider;
use Illuminate\Pagination\LengthAwarePaginator;

class ListIdP
{
    protected LengthAwarePaginator $result;

    public function execute(int $page = 0): self
    {
        $this->result = ViewIdentityProvider::orderBy('id', 'asc')->paginate($page);

        return $this;
    }

    public function getResult(): LengthAwarePaginator
    {
        return $this->result;
    }
}
