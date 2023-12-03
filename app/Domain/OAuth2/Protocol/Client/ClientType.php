<?php

namespace App\Domain\OAuth2\Protocol\Client;

enum ClientType: string
{
    case Confidential = 'confidential';
    case Public = 'public';
}
