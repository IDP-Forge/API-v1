<?php

namespace App\Domain\OAuth2\Protocol\Role\AuthorizationServer\MetadataValues;

readonly class ResponseTypesSupported
{
    public function __construct(
        public array $responseTypes
    ){}
}
