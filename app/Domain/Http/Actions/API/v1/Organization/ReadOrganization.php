<?php

namespace App\Domain\Http\Actions\API\v1\Organization;

use App\Models\Views\ViewOrganization;

class ReadOrganization
{
    protected array $response = [];

    public function execute(int $id): self
    {
        $this->response = ViewOrganization::findOrFail($id)->toArray();

        return $this;
    }

    public function getResult(): array
    {
        return $this->response;
    }
}
