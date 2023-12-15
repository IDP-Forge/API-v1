<?php

namespace App\Domain\OAuth2\Protocol\Grant;

use App\Domain\OAuth2\ValueObject\RequestParams;
use App\Domain\OAuth2\Exceptions\OAuth2Exception;
use app\Domain\OAuth2\Protocol\Grant\Definition\RefreshToken;
use app\Domain\OAuth2\Protocol\Grant\Definition\AuthorizationCode;

class OAuth2GrantCollection
{
    protected array $grants = [
        AuthorizationCode::class,
        RefreshToken::class,
    ];

    public function getGrant(RequestParams $params): OAuth2GrantInterface
    {
        foreach($this->grants as $grantClass)
        {
            $grant = new $grantClass;

            if($grant->fits($params)) return $grant;
        }

        OAuth2Exception::invalidRequest();
    }
}
