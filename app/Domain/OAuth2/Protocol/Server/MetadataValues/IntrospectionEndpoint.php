<?php

namespace App\Domain\OAuth2\Server\MetadataValues;

readonly class IntrospectionEndpoint
{
    public function __construct(
        public string $url
    ){}
}
