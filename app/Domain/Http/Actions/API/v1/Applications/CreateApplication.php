<?php

namespace App\Domain\Http\Actions\API\v1\Applications;

use App\Models\Application;
use App\Domain\Http\DTO\Application\CreateAppDTO;

class CreateApplication
{
    protected array $result = [];

    public function execute(CreateAppDTO $dto): self
    {
        $model = Application::create((array)$dto);

        $this->result = $model->toArray();

        return $this;
    }

    public function getResult(): array
    {
        return $this->result;
    }
}
