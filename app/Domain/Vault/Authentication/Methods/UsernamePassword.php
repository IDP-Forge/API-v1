<?php

namespace App\Domain\Vault\Authentication\Methods;

use Illuminate\Support\Facades\Http;
use App\Domain\Vault\Authentication\AuthToken;
use App\Domain\Vault\Authentication\AbstractAuthMethod;
use App\Domain\Vault\Authentication\AuthMethodInterface;
use App\Domain\Vault\Exceptions\AuthenticationException;

class UsernamePassword extends AbstractAuthMethod implements AuthMethodInterface
{

    public function __construct(
        public readonly string $username,
        #[\SensitiveParameter] protected readonly string $password,
        public readonly string $vaultUrl
    ){}

    public function authenticate(): void
    {
        $url = $this->getAuthUrl($this->vaultUrl, $this->username);

        $response = Http::withHeaders([
                'Content-Type' => 'application/json'
            ])
            ->post($url, ['password' => $this->password]);

        if(200 === $response->status())
        {
            $this->token = new AuthToken(
                $response->json('auth.client_token'),
                $response->json('auth.lease_duration')
            );

            $this->setClient(Http::withHeaders([
                'X-Vault-Token' => $this->token->token,
                'Accept' => 'application/json'
            ]));
        }
        else
        {
            throw new AuthenticationException('Invalid credentials');
        }
    }

    protected function getAuthUrl(string $url, string $username): string
    {
        return sprintf("%s/v1/auth/userpass/login/%s", rtrim($url, '/'), base64_encode($username));
    }
}
