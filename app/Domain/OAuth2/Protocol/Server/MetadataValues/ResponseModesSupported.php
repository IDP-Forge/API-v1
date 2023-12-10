<?php

namespace App\Domain\OAuth2\Server\MetadataValues;

readonly class ResponseModesSupported
{
    public function __construct(
        public array $modes
    ){}
}
