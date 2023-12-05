<?php

namespace App\Domain\Vault\Authentication\Methods;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Client\PendingRequest;
use App\Domain\Vault\Authentication\AbstractAuthMethod;
use App\Domain\Vault\Authentication\AuthMethodInterface;
use App\Domain\Vault\Exceptions\AuthenticationException;

class UsernamePassword extends AbstractAuthMethod implements AuthMethodInterface
{
    protected const ENGINE_AUTH_TOKEN_CACHE_KEY = 'vault.UsernamePassword.AccessToken';

    public function __construct(
        public readonly string $username,
        #[\SensitiveParameter] protected readonly string $password,
        public readonly string $vaultUrl
    ){}

    public function getAuthenticatedClient(): PendingRequest
    {
        if(!$this->isAuthenticated())
        {
            $this->authenticate();
        }

        return Http::withHeaders($this->getVaultClientRequestHeaders())
            ->withUrlParameters($this->getVaultClientUrlParameters());
    }

    public function isAuthenticated(): bool
    {
        $token = Cache::get(self::ENGINE_AUTH_TOKEN_CACHE_KEY);

        return !empty($token);
    }

    public function authenticate(): void
    {
        $url = $this->getAuthUrl($this->vaultUrl, $this->username);

        $headers = ['Content-Type' => 'application/json'];
        $params = ['password' => $this->password];

        $response = Http::withHeaders($headers)->post($url, $params);

        if(200 !== $response->status())
        {
            throw new AuthenticationException('Invalid Vault credentials');
        }

        // Cache, avoid authenticating to vault for every operation for the duration of the lease
        $token = $response->json('auth.client_token');
        $duration = (int)$response->json('auth.lease_duration');

        Cache::put(self::ENGINE_AUTH_TOKEN_CACHE_KEY, $token, $duration);
    }

    protected function getAuthUrl(string $url, string $username): string
    {
        return sprintf("%s/v1/auth/userpass/login/%s", rtrim($url, '/'), $username);
    }

    protected function getAccessToken(): string|null
    {
        return Cache::get(self::ENGINE_AUTH_TOKEN_CACHE_KEY);
    }

    protected function getVaultClientRequestHeaders(): array
    {
        return [
            self::VAULT_ACCESS_TOKEN_HEADER => $this->getAccessToken(),
            self::VAULT_ACCEPT_HEADER => 'application/json'
        ];
    }

    protected function getVaultClientUrlParameters(): array
    {
        return [
            self::VAULT_BASEURL_PARAM => $this->vaultUrl
        ];
    }
}
