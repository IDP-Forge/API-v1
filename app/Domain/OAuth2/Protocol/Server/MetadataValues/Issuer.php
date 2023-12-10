<?php

namespace App\Domain\OAuth2\Server\MetadataValues;

readonly class Issuer
{
    public function __construct(
        public string $value
    ){}
}
