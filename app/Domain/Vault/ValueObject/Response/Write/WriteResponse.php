<?php

namespace App\Domain\Vault\ValueObject\Response\Write;

use Illuminate\Support\Arr;

readonly class WriteResponse implements WriteResponseInterface
{
    public function __construct(
        public int $status,
        public string $request_id,
        public bool $renewable,
        public int $lease_duration,
        protected array $metadata,
        public ?string $wrap_info,
        public ?string $warnings,
        public ?string $auth
    ){}

    public function isSuccessful(): bool
    {
        return 200 === $this->status;
    }

    public function getMetadata(): array
    {
        return $this->metadata;
    }

    public function getVersion(): int
    {
        return Arr::get($this->metadata, 'version', 0);
    }
}
