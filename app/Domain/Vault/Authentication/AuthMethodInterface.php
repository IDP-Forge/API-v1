<?php

namespace App\Domain\Vault\Authentication;

use Illuminate\Http\Client\PendingRequest;

interface AuthMethodInterface
{
    public function authenticate(): void;

    public function setClient(PendingRequest $client): void;

    public function getClient(): PendingRequest;

    public function getToken(): AuthToken;
}
