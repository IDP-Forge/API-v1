<?php

namespace App\Domain\Vault\ValueObject;

interface ReadValueObjectInterface
{
    public function __construct(string $path);

    public function getPath(): string;
}
