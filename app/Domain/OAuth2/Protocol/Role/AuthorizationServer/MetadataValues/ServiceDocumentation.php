<?php

namespace App\Domain\OAuth2\Protocol\Role\AuthorizationServer\MetadataValues;

readonly class ServiceDocumentation
{
    public function __construct(
        public string $url
    ){}
}
