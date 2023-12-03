<?php

namespace App\Domain\IDPForge;

enum ProtocolTypeEnum: string
{
    case AuthN = 'authentication';
    case AuthZ = 'authorization';
}
