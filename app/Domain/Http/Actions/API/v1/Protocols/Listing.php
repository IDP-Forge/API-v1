<?php

namespace App\Domain\Http\Actions\API\v1\Protocols;

use App\Models\Protocol;

class Listing
{
    protected array $result = [];

    public function execute(): self
    {
        $this->result = Protocol::orderBy('id', 'asc')->get()->toArray();

        return $this;
    }

    public function getResult(): array
    {
        return $this->result;
    }
}
