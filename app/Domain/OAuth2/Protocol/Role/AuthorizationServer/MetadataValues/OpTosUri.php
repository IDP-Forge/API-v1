<?php

namespace App\Domain\OAuth2\Protocol\Role\AuthorizationServer\MetadataValues;

readonly class OpTosUri
{
    public function __construct(
        public string $url
    ){}
}
