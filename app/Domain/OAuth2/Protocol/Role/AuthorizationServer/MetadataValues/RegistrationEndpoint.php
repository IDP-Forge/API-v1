<?php

namespace App\Domain\OAuth2\Protocol\Role\AuthorizationServer\MetadataValues;

readonly class RegistrationEndpoint
{
    public function __construct(
        public string $endpoint
    ){}
}
