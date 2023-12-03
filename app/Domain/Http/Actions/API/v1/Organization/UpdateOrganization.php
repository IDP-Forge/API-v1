<?php

namespace App\Domain\Http\Actions\API\v1\Organization;

use App\Models\Organization;
use App\Domain\Http\DTO\Organization\UpdateOrganizationParams;

class UpdateOrganization
{
    protected array $result = [];

    public function execute(int $id, UpdateOrganizationParams $dto): self
    {
        $model = Organization::findOrFail($id);

        $model->update((array)$dto);

        $this->result = $model->toArray();

        return $this;
    }

    public function getResult(): array
    {
        return $this->result;
    }
}
