<?php

namespace App\Domain\OAuth2\Protocol\Role\AuthorizationServer\MetadataValues;

readonly class GrantTypesSupported
{
    public function __construct(
        public array $grantTypes
    ){}
}
