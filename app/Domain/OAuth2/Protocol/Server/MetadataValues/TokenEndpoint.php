<?php

namespace App\Domain\OAuth2\Server\MetadataValues;

readonly class TokenEndpoint
{
    public function __construct(
        public string $endpoint
    ){}
}
