<?php

namespace App\Domain\OAuth2\Server\MetadataValues;

readonly class RegistrationEndpoint
{
    public function __construct(
        public string $endpoint
    ){}
}
