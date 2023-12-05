<?php

namespace App\Domain\Vault\Authentication;

use Illuminate\Http\Client\PendingRequest;

abstract class AbstractAuthMethod
{
    protected const VAULT_ACCESS_TOKEN_HEADER = 'X-Vault-Token';
    protected const VAULT_ACCEPT_HEADER = 'Accept';

    protected PendingRequest $client;
    protected AuthToken $token;
    protected bool $isAuthenticated;

    public function setClient(PendingRequest $client): void
    {
        $this->client = $client;
    }

    public function getClient(): PendingRequest
    {
        return $this->client;
    }

    public function getToken(): AuthToken
    {
        return $this->token;
    }

    public function isAuthenticated(): bool
    {
        return $this->isAuthenticated;
    }
}
