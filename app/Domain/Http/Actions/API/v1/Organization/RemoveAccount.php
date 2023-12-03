<?php

namespace App\Domain\Http\Actions\API\v1\Organization;

use App\Models\Account2Organization;

class RemoveAccount
{
    protected array $result = [];

    public function execute(int $organization_id, int $account_id): self
    {
        $model = Account2Organization::where('organization_id', $organization_id)
            ->where('account_id', $account_id)
            ->findOrFail();

        $model->delete();

        $this->result = $model->toArray();

        return $this;
    }

    public function getResult(): array
    {
        return $this->result;
    }
}
