<?php

namespace App\Domain\OAuth2\Protocol\Role\AuthorizationServer\MetadataValues;

readonly class OpPolicyUri
{
    public function __construct(
        public string $url
    ){}
}
