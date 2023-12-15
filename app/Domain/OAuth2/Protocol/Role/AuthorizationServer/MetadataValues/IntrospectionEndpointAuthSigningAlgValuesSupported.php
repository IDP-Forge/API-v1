<?php

namespace App\Domain\OAuth2\Protocol\Role\AuthorizationServer\MetadataValues;

readonly class IntrospectionEndpointAuthSigningAlgValuesSupported
{
    public function __construct(
        public array $list
    ){}
}
