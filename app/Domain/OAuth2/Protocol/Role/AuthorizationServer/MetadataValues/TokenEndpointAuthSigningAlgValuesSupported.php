<?php

namespace App\Domain\OAuth2\Protocol\Role\AuthorizationServer\MetadataValues;

readonly class TokenEndpointAuthSigningAlgValuesSupported
{
    public function __construct(
        public array $algorithms
    ){}
}
