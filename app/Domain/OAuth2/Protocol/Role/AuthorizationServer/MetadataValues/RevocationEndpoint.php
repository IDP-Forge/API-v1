<?php

namespace App\Domain\OAuth2\Protocol\Role\AuthorizationServer\MetadataValues;

readonly class RevocationEndpoint
{
    public function __construct(
        public string $url
    ){}
}
