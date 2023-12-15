<?php

namespace App\Domain\OAuth2\Protocol\Role\AuthorizationServer\MetadataValues;

readonly class Issuer
{
    public function __construct(
        public string $value
    ){}
}
