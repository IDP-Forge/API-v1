<?php

namespace App\Domain\OAuth2\Protocol\Role\AuthorizationServer\MetadataValues;

readonly class UiLocalesSupported
{
    public function __construct(
        public array $locales
    ){}
}
