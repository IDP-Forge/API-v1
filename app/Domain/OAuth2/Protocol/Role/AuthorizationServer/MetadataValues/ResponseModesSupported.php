<?php

namespace App\Domain\OAuth2\Protocol\Role\AuthorizationServer\MetadataValues;

readonly class ResponseModesSupported
{
    public function __construct(
        public array $modes
    ){}
}
