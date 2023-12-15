<?php

namespace App\Domain\OAuth2\Protocol\Grant;

use App\Domain\OAuth2\ValueObject\RequestParams;

class Implicit implements OAuth2GrantInterface
{
    public function fits(RequestParams $params): bool
    {

    }
}
