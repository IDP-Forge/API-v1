<?php

namespace App\Domain\OAuth2\Server\MetadataValues;

readonly class GrantTypesSupported
{
    public function __construct(
        public array $grantTypes
    ){}
}
