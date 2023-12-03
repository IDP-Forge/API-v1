<?php

namespace App\Domain\Http\Actions\API\v1\Applications;

use App\Models\ApplicationType;

class ReadAppTypes
{
    protected array $result = [];

    public function execute(): self
    {
        $this->result = ApplicationType::orderBy('id', 'asc')->get()->all();

        return $this;
    }

    public function getResult(): array
    {
        return $this->result;
    }
}
