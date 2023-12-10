<?php

namespace App\Domain\OAuth2\Server\MetadataValues;

readonly class OpPolicyUri
{
    public function __construct(
        public string $url
    ){}
}
