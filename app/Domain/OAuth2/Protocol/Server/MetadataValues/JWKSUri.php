<?php

namespace App\Domain\OAuth2\Server\MetadataValues;

readonly class JWKSUri
{
    public function __construct(
        public string $url
    ){}
}
