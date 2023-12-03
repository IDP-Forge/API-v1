<?php

namespace App\Domain\Vault\Authentication;

use Illuminate\Http\Client\PendingRequest;

abstract class AbstractAuthMethod
{
    protected PendingRequest $client;
    protected AuthToken $token;

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
}
