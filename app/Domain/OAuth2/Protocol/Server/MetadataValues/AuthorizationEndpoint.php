<?php

namespace App\Domain\OAuth2\Server\MetadataValues;

readonly class AuthorizationEndpoint
{
    public function __construct(
        public string $endpoint
    ){}
}
