<?php

namespace App\Domain\Vault\Engine;

use App\Domain\Vault\Authentication\AuthMethodInterface;
use App\Domain\Vault\ValueObject\Request\Read\ReadRequestInterface;
use App\Domain\Vault\ValueObject\Response\Read\ReadResponseInterface;
use App\Domain\Vault\ValueObject\Request\Write\WriteRequestInterface;
use App\Domain\Vault\ValueObject\Response\Write\WriteResponseInterface;

interface EngineInterface
{
    public function __construct(
        AuthMethodInterface $auth
    );

    public function read(ReadRequestInterface $read): ReadResponseInterface;

    public function write(WriteRequestInterface $write): WriteResponseInterface;
}
