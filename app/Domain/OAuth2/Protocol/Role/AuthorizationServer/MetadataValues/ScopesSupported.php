<?php

namespace App\Domain\OAuth2\Protocol\Role\AuthorizationServer\MetadataValues;

readonly class ScopesSupported
{
    public function __construct(
        public readonly array $scopes
    ){}
}
