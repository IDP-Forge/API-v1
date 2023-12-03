<?php

namespace App\Domain\Http\Actions\API\v1\Organization;

use App\Models\Organization;

class DeleteOrganization
{
    protected array $result = [];

    public function execute(int $id): self
    {
        $model = Organization::findOrFail($id);

        $model->delete();

        $this->result = $model->toArray();

        return $this;
    }

    public function getResult(): array
    {
        return $this->result;
    }
}
