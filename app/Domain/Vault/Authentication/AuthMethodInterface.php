<?php

namespace App\Domain\Vault\Authentication;

use Illuminate\Http\Client\PendingRequest;

interface AuthMethodInterface
{
    public const VAULT_BASEURL_PARAM = 'baseUrl';

    public function authenticate(): void;

    public function getAuthenticatedClient(): PendingRequest;

    public function isAuthenticated(): bool;
}
