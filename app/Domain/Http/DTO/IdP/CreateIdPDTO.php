<?php

namespace App\Domain\Http\DTO\IdP;

readonly class CreateIdPDTO
{
    public function __construct(
        public int $type_id,
        public bool $is_default,
        public string $title,
        public string $description,
        public array $config
    ){}
}
