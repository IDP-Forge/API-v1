<?php

namespace App\Domain\Vault\ValueObject;

interface WriteValueObjectInterface
{
    public function __construct(string $path, array $data);

    public function getPath(): string;

    public function getValue(): array;
}
