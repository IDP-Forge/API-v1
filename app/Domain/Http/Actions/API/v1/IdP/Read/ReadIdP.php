<?php

namespace App\Domain\Http\Actions\API\v1\IdP\Read;

use App\Models\IdentityProvider;

class ReadIdP
{
    protected array $result = [];

    public function execute(int $id): self
    {
        $model = IdentityProvider::findOrFail($id);

        $this->result = $model->toArray();

        return $this;
    }

    public function getResult(): array
    {
        return $this->result;
    }
}
