<?php

namespace app\Domain\OAuth2\Protocol\Grant\Definition;

use App\Domain\OAuth2\ValueObject\RequestParams;
use App\Domain\OAuth2\Protocol\OAuth2Parameters;
use App\Domain\OAuth2\Protocol\Grant\OAuth2GrantInterface;

class AuthorizationCode implements OAuth2GrantInterface
{
    public function fits(RequestParams $params): bool
    {
        return
            $params->response_type === OAuth2Parameters::Code->value
            && !empty($params->client_id)
            && !empty($params->redirect_uri)
            && !str_contains($params->scope, OAuth2Parameters::ScopeOpenID->value);
    }
}
