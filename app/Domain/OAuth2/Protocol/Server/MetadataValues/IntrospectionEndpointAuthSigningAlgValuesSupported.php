<?php

namespace App\Domain\OAuth2\Server\MetadataValues;

readonly class IntrospectionEndpointAuthSigningAlgValuesSupported
{
    public function __construct(
        public array $list
    ){}
}
