<?php

namespace App\Domain\Http\Actions\API\v1\Organization;

use App\Models\Permission;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Domain\Http\DTO\Organization\ListPermissionsParams;

class ReadOrganizationPermissions
{
    protected LengthAwarePaginator $result;

    public function execute(int $organization_id, ListPermissionsParams $dto): self
    {
        $collection = Permission::where('organization_id', $organization_id);

        if(!empty($dto->filter))
        {
            $value = str_replace('%', '', $dto->filter) .'%';

            $collection
                ->where('title', 'LIKE', $value)
                ->orWhere('slug', 'LIKE', $value);
        }

        $this->result = $collection->paginate(
            perPage: $dto->limit,
            page: $dto->page
        );

        return $this;
    }

    public function getResult(): LengthAwarePaginator
    {
        return $this->result;
    }
}
