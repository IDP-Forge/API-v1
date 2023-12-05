<?php

namespace App\Domain\Vault\ValueObject;

final class ReadValueObject extends AbstractValueObject implements ReadValueObjectInterface
{
    protected string $path;

    public function __construct(
        string $path
    )
    {
        $this->validate($path);

        $this->path = $this->getPathFromString($path);
    }

    public function getPath(): string
    {
        return $this->path;
    }
}
