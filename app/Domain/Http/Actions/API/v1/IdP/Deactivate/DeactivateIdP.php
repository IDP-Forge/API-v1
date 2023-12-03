<?php

namespace App\Domain\Http\Actions\API\v1\IdP\Deactivate;

class DeactivateIdP
{
    protected array $result = [];

    public function execute(): self
    {
        return $this;
    }

    public function getResult(): array
    {
        return $this->result;
    }
}
