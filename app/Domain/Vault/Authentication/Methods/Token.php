<?php

namespace App\Domain\Vault\Authentication\Methods;

use App\Domain\Vault\Authentication\AuthToken;
use App\Domain\Vault\Authentication\AbstractAuthMethod;
use App\Domain\Vault\Authentication\AuthMethodInterface;

class Token extends AbstractAuthMethod implements AuthMethodInterface
{
    public function __construct(string $token)
    {
        $this->token = new AuthToken($token, 0);
    }

    public function authenticate(): void
    {
        $this->isAuthenticated = true;
    }
}
