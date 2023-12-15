<?php

namespace App\Domain\OAuth2\Protocol\Role\AuthorizationServer\MetadataValues;

readonly class AuthorizationEndpoint
{
    public function __construct(
        public string $endpoint
    ){}
}
