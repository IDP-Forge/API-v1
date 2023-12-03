<?php

namespace App\Domain\Http\Actions\API\v1\Organization;

use App\Models\Permission;
use App\Domain\Http\DTO\Organization\CreatePermissionParams;

class CreateOrganizationPermission
{
    protected array $result = [];

    public function execute(int $organization_id, CreatePermissionParams $dto): self
    {
        $model = Permission::create(
            array_merge(['organization_id' => $organization_id], (array)$dto)
        );

        $this->result = $model->toArray();

        return $this;
    }

    public function getResult(): array
    {
        return $this->result;
    }
}
