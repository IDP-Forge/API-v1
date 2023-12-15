<?php

namespace App\Domain\OAuth2\ValueObject;

readonly class RequestParams
{
    public function __construct(
        public ?string $grant_type,
        public ?string $response_type,
        public ?string $client_id,
        public ?string $redirect_uri,
        public ?string $scope,
        public ?string $client_secret,
        public ?string $code_challenge,
        public ?string $code_challenge_method,
        public ?string $code,
        public ?string $state,
        public ?string $refresh_token,
        public ?string $server_id // IDPForge extension
    ){}
}
