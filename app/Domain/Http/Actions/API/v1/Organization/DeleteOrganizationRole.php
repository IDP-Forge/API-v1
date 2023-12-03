<?php

namespace App\Domain\Http\Actions\API\v1\Organization;

class DeleteOrganizationRole
{
    protected array $result = [];

    public function execute(): self
    {
        return $this;
    }

    public function getResult(): array
    {
        return $this->result;
    }
}
