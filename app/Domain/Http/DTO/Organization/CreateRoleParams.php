<?php

namespace App\Domain\Http\DTO\Organization;

readonly class CreateRoleParams
{
    public function __construct(
        public int $protected,
        public string $title,
        public string $slug,
        public string $description
    ){}
}
