<?php

namespace App\Domain\Vault\Authentication;

class AuthToken
{
    protected int $end;
    public function __construct(
        #[\SensitiveParameter] public readonly string $token,
        public readonly int $lease_duration
    )
    {
        $this->end = time() + $this->lease_duration;
    }

    public function isValidLease(): bool
    {
        return time() < $this->end;
    }
}
