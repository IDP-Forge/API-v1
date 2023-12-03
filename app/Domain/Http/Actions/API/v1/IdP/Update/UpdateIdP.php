<?php

namespace App\Domain\Http\Actions\API\v1\IdP\Update;

use App\Models\IdentityProvider;
use App\Domain\Http\DTO\IdP\UpdateIdPDTO;
use App\Models\Views\ViewIdentityProvider;

class UpdateIdP
{
    protected array $result = [];

    public function execute(int $id, UpdateIdPDTO $dto): self
    {
        $model = IdentityProvider::findOrFail($id);

        $model->update((array)$dto);

        $this->result = ViewIdentityProvider::findOrFail($id)->toArray();

        return $this;
    }

    public function getResult(): array
    {
        return $this->result;
    }
}
