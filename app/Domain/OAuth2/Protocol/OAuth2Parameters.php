<?php

namespace App\Domain\OAuth2\Protocol;

enum OAuth2Parameters: string
{
    case Code = 'code';
    case Scope = 'scope';
    case ResponseType = 'response_type';
    case ClientID = 'client_id';
    case RedirectUri = 'redirect_uri';
}
