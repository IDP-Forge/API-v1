<?php

namespace App\Domain\OAuth2\ValueObject;

use Lcobucci\JWT\Signer;

readonly class OAuth2Client
{
    public function __construct(
        public int $id,
        public string $title,
        public string $client_id,
        public string $client_secret,
        public array $redirect_uris,
        public bool $wants_refresh_token,
        public bool $wants_opaque_token,
        public bool $wants_pkce,
        public Signer $signer,
        public ?string $code_challenge_method,
        public ?string $code_challenge,
        public ?string $code_verifier
    ){}
}
