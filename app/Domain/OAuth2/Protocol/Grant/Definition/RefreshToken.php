<?php

namespace app\Domain\OAuth2\Protocol\Grant\Definition;

use App\Domain\OAuth2\ValueObject\RequestParams;
use App\Domain\OAuth2\Protocol\OAuth2Parameters;
use App\Domain\OAuth2\Protocol\Grant\OAuth2GrantInterface;

class RefreshToken implements OAuth2GrantInterface
{
    public function fits(RequestParams $params): bool
    {
        return (0 === strcmp($params->grant_type, OAuth2Parameters::RefreshToken->value))
            && !empty($params->refresh_token)
            && !empty($params->client_id)
            && !empty($params->client_secret);
    }
}
