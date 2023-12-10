<?php

namespace App\Domain\OAuth2\Server\MetadataValues;

readonly class TokenEndpointAuthMethodsSupported
{
    public function __construct(
        public array $methods
    ){}
}
