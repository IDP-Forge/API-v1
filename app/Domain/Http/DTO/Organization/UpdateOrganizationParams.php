<?php

namespace App\Domain\Http\DTO\Organization;

class UpdateOrganizationParams
{
    public function __construct(
        public string $title,
        public ?int $parent_id = null,
        public ?bool $active = false,
        public ?string $description = null,
        public ?array $metadata = []
    ){}
}
