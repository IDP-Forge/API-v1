<?php

namespace App\Domain\Http\DTO\Organization;

use App\Domain\MySQL\SortWay;

readonly class ListAccountsParams
{
    public function __construct(
        public ?string $title = null,
        public ?SortWay $sortWay = SortWay::ASC,
        public ?int $limit = 10,
        public ?int $offset = 0,
        public ?string $sortBy = null
    ){}
}
