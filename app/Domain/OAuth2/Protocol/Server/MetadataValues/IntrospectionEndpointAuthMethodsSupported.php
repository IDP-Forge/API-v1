<?php

namespace App\Domain\OAuth2\Server\MetadataValues;

readonly class IntrospectionEndpointAuthMethodsSupported
{
    public function __construct(
        public array $methods
    ){}
}
