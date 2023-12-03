<?php

namespace App\Domain\Http\Actions\API\v1\Organization;

use App\Models\Role;

class ReadOrganizationRoles
{
    protected array $result = [];

    public function execute(int $organization_id): self
    {
        $this->result = Role::where('organization_id', $organization_id)->get()->toArray();

        return $this;
    }

    public function getResult(): array
    {
        return $this->result;
    }
}
