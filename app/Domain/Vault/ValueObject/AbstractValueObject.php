<?php

namespace App\Domain\Vault\ValueObject;

use App\Domain\Vault\Exceptions\InvalidVaultPath;

class AbstractValueObject
{
    protected const VAULT_PROTO = 'vault://';

    protected function validate(string $value): void
    {
        if(!str_starts_with($value, self::VAULT_PROTO))
        {
            throw new InvalidVaultPath('Invalid vault path. Cannot find "'. self::VAULT_PROTO .'" in value: '. $value);
        }
    }

    protected function getPathFromString(string $value): string
    {
        return str_replace(self::VAULT_PROTO, '', $value);
    }
}
