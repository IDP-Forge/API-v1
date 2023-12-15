<?php

namespace App\Domain\OAuth2\Protocol\Role\Client;

enum ClientType: string
{
    case T_PUBLIC = 'public';
    case T_PRIVATE = 'confidential';
}
