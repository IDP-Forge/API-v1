<?php

namespace App\Domain\Http\Actions\API\v1\Organization;

use Illuminate\Support\Str;
use App\Models\Views\ViewAccount2Organization;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Domain\Http\DTO\Organization\ListAccountsParams;

class ReadAccounts
{
    protected LengthAwarePaginator $result;

    public function execute(int $id, ListAccountsParams $params): self
    {
        $collection = (new ViewAccount2Organization())
            ->where('organization_id', $id);

        if(!empty($params->title))
        {
            $collection->where('username_readable', 'LIKE', Str::replace('%', '', $params->title) . '%');
        }

        $this->result = $collection
            ->paginate($params->limit);

        return $this;
    }

    public function getResult(): LengthAwarePaginator
    {
        return $this->result;
    }
}
