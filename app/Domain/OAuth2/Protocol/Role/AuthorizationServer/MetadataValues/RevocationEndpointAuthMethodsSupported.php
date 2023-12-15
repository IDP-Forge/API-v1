<?php

namespace App\Domain\OAuth2\Protocol\Role\AuthorizationServer\MetadataValues;

readonly class RevocationEndpointAuthMethodsSupported
{
    public function __construct(
        public array $list
    ){}
}
