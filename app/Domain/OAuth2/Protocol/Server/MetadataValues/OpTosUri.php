<?php

namespace App\Domain\OAuth2\Server\MetadataValues;

readonly class OpTosUri
{
    public function __construct(
        public string $url
    ){}
}
