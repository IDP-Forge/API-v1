<?php

namespace App\Models\Views;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewApplication extends Model
{
    use HasFactory;

    protected $table = 'view_applications';

    protected $casts = [
        'config' => 'array',
        'metadata' => 'array'
    ];

    public static function findByUniqueID(string $value): self
    {
        return static::where('unique_id', hash('sha256', $value))->firstOrFail();
    }

    public function getTitle(): string
    {
        return $this->getAttribute('title');
    }

    public function getOAuth2ClientID(): string
    {
        return $this->getAttribute('unique_id');
    }

    public function getOAuth2ClientSecret(): string
    {
        return Arr::get($this->metadata, 'oauth2.client_secret');
    }

    public function getOAuth2WantsRefreshToken(): bool
    {
        return Arr::get($this->metadata, 'oauth2.wants_refresh_token', false);
    }

    public function getOAuth2WantsOpaqueToken(): bool
    {
        return Arr::get($this->metadata, 'oauth2.wants_opaque_token', false);
    }

    public function getOAuth2WantsPKCE(): bool
    {
        return Arr::get($this->metadata, 'oauth2.pkce.enabled', false);
    }

    public function getOAuth2RedirectURIs(): array
    {
        return Arr::get($this->metadata, 'oauth2.redirect_uris', []);
    }

    public function getOAuth2SignerAlgorithm(): string
    {
        return Arr::get($this->metadata, 'oauth2.signer.class');
    }

    public function getOAuth2SignerIsAsymmetric(): bool
    {
        return Arr::get($this->metadata, 'oath2.signer.is_asymmetric', false);
    }

    public function getOAuth2SymmetricKeyPath(): ?string
    {
        return Arr::get($this->metadata, 'oath2.signer.key.path', false);
    }

    public function getOAuth2SignerPublicKeyPath(): string
    {
        return Arr::get($this->metadata, 'oauth2.signer.key.public');
    }

    public function getOAuth2SignerPrivateKeyPath(): string
    {
        return Arr::get($this->metadata, 'oauth2.signer.key.private');
    }

    public function getOAuth2SignerPrivateKeyPassphrasePath(): ?string
    {
        return Arr::get($this->metadata, 'oauth2.signer.key.private_passphrase', null);
    }
}
