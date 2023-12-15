<?php

namespace app\Domain\OAuth2\Protocol\Grant\Definition;

use App\Domain\OAuth2\ValueObject\RequestParams;
use App\Domain\OAuth2\Protocol\Grant\OAuth2GrantInterface;

class Implicit implements OAuth2GrantInterface
{
    public function fits(RequestParams $params): bool
    {

    }
}
