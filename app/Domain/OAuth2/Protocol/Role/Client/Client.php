<?php

namespace App\Domain\OAuth2\Protocol\Role\Client;

readonly class Client
{
    public function __construct(
        public string                        $client_id,
        #[\SensitiveParameter] public string $client_secret,
        public ClientType                    $type,
        public ClientProfile                 $profile
    ){}
}
