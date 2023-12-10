<?php

namespace App\Domain\OAuth2\Server\MetadataValues;

readonly class CodeChallengeMethodsSupported
{
    public function __construct(
        public array $methods
    ){}
}
