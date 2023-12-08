<?php

namespace App\Domain\Vault\ValueObject\Response\Read;

interface ReadResponseInterface
{
    public function getValue(): mixed;

    public function getStatusCode(): int;

    public function getMetadata(): ?array;
}
