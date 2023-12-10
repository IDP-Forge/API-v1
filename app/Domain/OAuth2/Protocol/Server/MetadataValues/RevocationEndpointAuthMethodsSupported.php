<?php

namespace App\Domain\OAuth2\Server\MetadataValues;

readonly class RevocationEndpointAuthMethodsSupported
{
    public function __construct(
        public array $list
    ){}
}
