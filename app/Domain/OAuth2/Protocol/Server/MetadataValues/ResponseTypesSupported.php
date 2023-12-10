<?php

namespace App\Domain\OAuth2\Server\MetadataValues;

readonly class ResponseTypesSupported
{
    public function __construct(
        public array $responseTypes
    ){}
}
