<?php

namespace App\Domain\Http\Actions\API\v1\Organization;

use App\Models\Organization;
use App\Domain\Http\DTO\Organization\CreateOrganizationParams;

class CreateOrganization
{
    protected array $response = [];

    public function execute(CreateOrganizationParams $dto): self
    {
        $this->response = Organization::create((array)$dto)->toArray();

        return $this;
    }

    public function getResult(): array
    {
        return $this->response;
    }
}
