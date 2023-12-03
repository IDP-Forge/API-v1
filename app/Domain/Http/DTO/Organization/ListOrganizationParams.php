<?php

namespace App\Domain\Http\DTO\Organization;

use App\Domain\MySQL\SortWay;

readonly class ListOrganizationParams
{
    public function __construct(
        public ?string $title = null,
        public ?SortWay $sortWay = SortWay::ASC,
        public ?int $limit = 10,
        public ?bool $active = null,
        public ?string $sortBy = null
    ){}
}
