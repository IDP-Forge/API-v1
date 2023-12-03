<?php

namespace App\Domain\Http\Actions\API\v1\Organization;

use App\Models\Views\ViewAccountRoles;

class ReadOrganizationAccountRoles
{
    protected array $result = [];

    public function execute(int $organization_id, int $account_id): self
    {
        $this->result = ViewAccountRoles::where('organization_id', $organization_id)
            ->where('account_id', $account_id)
            ->get()
            ->toArray();

        return $this;
    }

    public function getResult(): array
    {
        return $this->result;
    }
}
