<?php

namespace App\Domain\OAuth2\Server\MetadataValues;

readonly class RevocationEndpoint
{
    public function __construct(
        public string $url
    ){}
}
