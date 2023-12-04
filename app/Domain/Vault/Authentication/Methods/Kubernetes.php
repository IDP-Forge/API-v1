<?php

namespace App\Domain\Vault\Authentication\Methods;

use Illuminate\Support\Facades\Http;
use App\Domain\Vault\Authentication\AuthToken;
use App\Domain\Vault\Authentication\AbstractAuthMethod;
use App\Domain\Vault\Authentication\AuthMethodInterface;
use App\Domain\Vault\Exceptions\AuthenticationException;

class Kubernetes extends AbstractAuthMethod implements AuthMethodInterface
{
    protected string $endpoint = '/v1/auth/kubernetes/login';

    public function __construct(
        public readonly string $jwt,
        public readonly string $role,
        public readonly string $vaultUrl
    ){}

    public function authenticate(): void
    {
        $response = Http::post($this->getAuthUrl($this->vaultUrl, $this->endpoint), [
            'role' => $this->role,
            'jwt' => $this->jwt
        ]);

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
            throw new AuthenticationException('Invalid Kubernetes credentials');
        }
    }

    protected function getAuthUrl(string $url, string $path): string
    {
        return sprintf("%s/%s", rtrim($url, '/'), $path);
    }
}
