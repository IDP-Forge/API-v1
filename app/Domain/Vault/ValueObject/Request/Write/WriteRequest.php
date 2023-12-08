<?php

namespace App\Domain\Vault\ValueObject\Request\Write;

use App\Domain\Vault\ValueObject\Request\AbstractRequest;

class WriteRequest extends AbstractRequest implements WriteRequestInterface
{
    protected string $path;
    protected array $data;

    public function __construct(
        string $path,
        array $data = []
    )
    {
        $this->validate($path);

        $this->path = $this->getPathFromString($path);
        $this->data = $data;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getValue(): array
    {
        return $this->data;
    }
}
