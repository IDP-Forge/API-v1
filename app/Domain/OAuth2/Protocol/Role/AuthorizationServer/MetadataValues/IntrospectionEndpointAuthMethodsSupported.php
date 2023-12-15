<?php

namespace App\Domain\OAuth2\Protocol\Role\AuthorizationServer\MetadataValues;

readonly class IntrospectionEndpointAuthMethodsSupported
{
    public function __construct(
        public array $methods
    ){}
}
