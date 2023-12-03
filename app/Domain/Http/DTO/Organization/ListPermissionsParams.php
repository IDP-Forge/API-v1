<?php

namespace App\Domain\Http\DTO\Organization;

readonly class ListPermissionsParams
{
    public function __construct(
        public ?string $filter = null,
        public ?int $limit = 10,
        public ?int $page = 1
    ){}
}
