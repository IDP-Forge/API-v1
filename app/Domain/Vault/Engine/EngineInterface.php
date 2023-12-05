<?php

namespace App\Domain\Vault\Engine;

use Illuminate\Http\Client\PendingRequest;
use App\Domain\Vault\Authentication\AuthMethodInterface;
use App\Domain\Vault\ValueObject\ReadValueObjectInterface;
use App\Domain\Vault\ValueObject\WriteValueObjectInterface;
use App\Domain\Vault\ValueObject\ResponseValueObjectInterface;

interface EngineInterface
{
    public function __construct(
        AuthMethodInterface $auth
    );

    public function read(ReadValueObjectInterface $read): ResponseValueObjectInterface;

    public function write(WriteValueObjectInterface $write);
}
