<?php

namespace App\Domain\Http\Actions\API\v1\Organization;

use App\Models\Organization;
use App\Domain\Http\Actions\API\v1\Organization\Listing\Stages\OrderBy;

class ReadOrganizationChildren
{
    protected array $result = [];

    public function execute(int $organization_id): self
    {
        $this->result = Organization::where('parent_id', $organization_id)
            ->orderBy('title', 'asc')
            ->get()
            ->all();

        return $this;
    }

    public function getResult(): array
    {
        return $this->result;
    }
}
