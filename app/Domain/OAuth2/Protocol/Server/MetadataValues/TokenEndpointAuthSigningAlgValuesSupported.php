<?php

namespace App\Domain\OAuth2\Server\MetadataValues;

readonly class TokenEndpointAuthSigningAlgValuesSupported
{
    public function __construct(
        public array $algorithms
    ){}
}
