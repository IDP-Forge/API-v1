<?php

namespace App\Domain\Vault;

use Illuminate\Support\Facades\Cache;
use App\Domain\Vault\Engine\EngineInterface;
use App\Domain\Vault\ValueObject\ReadValueObject;
use App\Domain\Vault\ValueObject\WriteValueObject;
use App\Domain\Vault\Authentication\AuthMethodInterface;
use App\Domain\Vault\Exceptions\AuthenticationException;
use App\Domain\Vault\ValueObject\ResponseValueObjectInterface;

class HashicorpVault
{
    public const LARAVEL_NAME = 'HashicorpVaultAdapter';
    protected const CACHE_KEY_PREFIX = 'hcpvault';
    protected const CACHE_HASH_KEY_ALGO = 'sha256';

    public function __construct(
        public readonly AuthMethodInterface $authMethod,
        public readonly EngineInterface $engine,
        public readonly int $authRetries = 2
    ){}

    public function read(string $path): ResponseValueObjectInterface
    {
        $value = new ReadValueObject($path);

        return $this->withReauthentication(function() use ($value)
        {
            return $this->engine->read($value);
        }, $this->authRetries);
    }

    public function write(string $path, array $data)
    {
        $value = new WriteValueObject($path, $data);

        return $this->withReauthentication(function() use ($value)
        {
            return $this->engine->write($value);
        }, $this->authRetries);
    }

    protected function computeHashKey(string $value): string
    {
        return sprintf("%s.%s", self::CACHE_KEY_PREFIX, hash(self::CACHE_HASH_KEY_ALGO, $value));
    }

    protected function readFromCache(string $value): null|string|int|float
    {
        return Cache::get($this->computeHashKey($value));
    }


    protected function withReauthentication(\Closure $callable, int $retries = 1): ResponseValueObjectInterface
    {
        for($i = 0; $i < $retries; $i++)
        {
            try
            {
                if(!$this->authMethod->isAuthenticated())
                {
                    $this->authMethod->authenticate();
                }

                return $callable();
            }
            catch(AuthenticationException $e)
            {
                if($i === ($retries - 1))
                {
                    throw $e;
                }
            }
        }
    }
}
