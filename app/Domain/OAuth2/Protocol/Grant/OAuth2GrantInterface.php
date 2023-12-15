<?php

namespace App\Domain\OAuth2\Protocol\Grant;

use App\Domain\OAuth2\ValueObject\RequestParams;

interface OAuth2GrantInterface
{
    public function fits(RequestParams $params): bool;
}
