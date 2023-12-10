<?php

namespace App\Domain\OAuth2\Server\MetadataValues;

readonly class ServiceDocumentation
{
    public function __construct(
        public string $url
    ){}
}
