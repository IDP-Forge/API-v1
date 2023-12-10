<?php

namespace App\Domain\Http\DTO\Application;

readonly class CreateAppDTO
{
    public function __construct(
        public int $protocol_id,
        public bool $active,
        public string $title,
        public ?string $description = null,
        public ?array $config = []
    ){}
}
