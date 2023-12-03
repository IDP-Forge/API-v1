<?php

namespace App\Domain\Http\DTO\Organization;

readonly class CreatePermissionParams
{
    public function __construct(
        public bool $protected,
        public string $title,
        public string $slug,
        public ?string $description = null
    ){}
}
