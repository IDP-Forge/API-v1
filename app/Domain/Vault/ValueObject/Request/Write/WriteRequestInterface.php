<?php

namespace App\Domain\Vault\ValueObject\Request\Write;

interface WriteRequestInterface
{
    public function __construct(string $path, array $data);

    public function getPath(): string;

    public function getValue(): array;
}
