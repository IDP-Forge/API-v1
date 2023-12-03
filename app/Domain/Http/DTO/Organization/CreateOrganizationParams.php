<?php

namespace App\Domain\Http\DTO\Organization;

readonly class CreateOrganizationParams
{
    public function __construct(
        public string $title,
        public ?int $parent_id = null,
        public ?bool $active = false,
        public ?string $description = null,
        public ?string $unique_id = null,
        public ?string $client_id = null
    ){}
}
