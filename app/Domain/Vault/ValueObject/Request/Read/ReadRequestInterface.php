<?php

namespace App\Domain\Vault\ValueObject\Request\Read;

interface ReadRequestInterface
{
    public function __construct(string $path);

    public function getPath(): string;
}
