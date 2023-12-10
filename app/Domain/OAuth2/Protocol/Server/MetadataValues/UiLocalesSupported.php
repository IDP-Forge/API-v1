<?php

namespace App\Domain\OAuth2\Server\MetadataValues;

readonly class UiLocalesSupported
{
    public function __construct(
        public array $locales
    ){}
}
