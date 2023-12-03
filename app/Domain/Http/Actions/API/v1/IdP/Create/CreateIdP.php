<?php

namespace App\Domain\Http\Actions\API\v1\IdP\Create;

use App\Models\IdentityProvider;
use Illuminate\Support\Facades\DB;
use App\Domain\Http\DTO\IdP\CreateIdPDTO;

class CreateIdP
{
    protected array $result = [];

    public function execute(CreateIdPDTO $dto): self
    {
        $model = DB::transaction(function() use ($dto)
        {
            if($dto->is_default) IdentityProvider::where('is_default', 1)->update(['is_default' => 0]);

            return IdentityProvider::create([
                'type_id' => $dto->type_id,
                'is_default' => $dto->is_default,
                'title' => $dto->title,
                'description' => $dto->description,
                'config' => $dto->config
            ]);
        });

        $this->result = $model->toArray();

        return $this;
    }

    public function getResult(): array
    {
        return $this->result;
    }
}
