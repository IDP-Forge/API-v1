<?php

namespace App\Domain\Http\Actions\API\v1\Organization;

use App\Models\Role;
use App\Domain\Http\DTO\Organization\CreateRoleParams;

class CreateOrganizationRole
{
    protected array $result = [];

    public function execute(int $organization_id, CreateRoleParams $params): self
    {
        $model = Role::create(
            array_merge(['organization_id' => $organization_id], (array)$params)
        );

        $this->result = $model->toArray();

        return $this;
    }

    public function getResult(): array
    {
        return $this->result;
    }
}
