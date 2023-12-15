<?php

namespace App\Domain\OAuth2\Protocol\Role\AuthorizationServer\MetadataValues;

readonly class TokenEndpointAuthMethodsSupported
{
    public function __construct(
        public array $methods
    ){}
}
