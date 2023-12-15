<?php

namespace App\Domain\OAuth2\Protocol;

enum OAuth2Parameters: string
{
    case Code = 'code';
    case AuthorizationCode = 'authorization_code';
    case RefreshToken = 'refresh_token';
    case Scope = 'scope';
    case ResponseType = 'response_type';
    case GrantType = 'grant_type';
    case ClientID = 'client_id';
    case ServerID = 'server_id';
    case ClientSecret = 'client_secret';
    case RedirectUri = 'redirect_uri';
    case ScopeOpenID = 'openid';
    case CodeChallenge = 'code_challenge';
    case CodeChallengeMethod = 'code_challenge_method';
    case State = 'state';
}
