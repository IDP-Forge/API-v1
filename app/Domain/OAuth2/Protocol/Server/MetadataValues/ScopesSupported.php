<?php

namespace App\Domain\OAuth2\Server\MetadataValues;

readonly class ScopesSupported
{
    public function __construct(
        public readonly array $scopes
    ){}
}
