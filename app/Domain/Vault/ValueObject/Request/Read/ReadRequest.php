<?php

namespace App\Domain\Vault\ValueObject\Request\Read;

use App\Domain\Vault\ValueObject\Request\AbstractRequest;

class ReadRequest extends AbstractRequest implements ReadRequestInterface
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
