<?php

namespace App\Domain\Vault\ValueObject\Response\Read;

class ReadResponse implements ReadResponseInterface
{
    public function __construct(
        protected mixed $value,
        protected bool $found,
        protected int $status,
        protected ?string $request_id,
        protected ?string $lease_id,
        protected ?bool $renewable,
        protected ?int $lease_duration,
        protected ?array $metadata
    ){}

    public function getValue(): mixed
    {
        return $this->value;
    }

    public function isFound(): bool
    {
        return $this->found;
    }

    public function getStatusCode(): int
    {
        return $this->status;
    }

    public function getRequestID(): ?string
    {
        return $this->request_id;
    }

    public function getLeaseID(): ?string
    {
        return $this->lease_id;
    }

    public function isRenewable(): ?bool
    {
        return $this->renewable;
    }

    public function getLeaseDuration(): ?int
    {
        return $this->lease_duration;
    }

    public function getMetadata(): ?array
    {
        return $this->metadata;
    }
}
