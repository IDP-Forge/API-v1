<?php

namespace App\Domain\Vault\ValueObject;

interface ResponseValueObjectInterface
{
    public function getValue(): mixed;

    public function getStatusCode(): int;

    public function getMetadata(): ?array;
}
