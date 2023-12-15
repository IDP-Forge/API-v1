<?php

namespace App\Domain\OAuth2\Protocol\Role\AuthorizationServer\MetadataValues;

readonly class JWKSUri
{
    public function __construct(
        public string $url
    ){}
}
