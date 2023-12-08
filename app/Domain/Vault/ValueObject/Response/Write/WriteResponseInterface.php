<?php

namespace App\Domain\Vault\ValueObject\Response\Write;

interface WriteResponseInterface
{
    public function isSuccessful(): bool;

    public function getMetadata(): array;

    public function getVersion(): int;
}
