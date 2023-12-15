<?php

namespace App\Domain\OAuth2\Exceptions;

enum ErrorCodeEnum: string
{
    case InvalidRequest = 'invalid_request';
    case UnauthorizedClient = 'unauthorized_client';
    case InvalidClient = 'invalid_client';
    case AccessDenied = 'access_denied';
    case UnsupportedResponseType = 'unsupported_response_type';
    case InvalidScope = 'invalid_scope';
    case ServerError = 'server_error';
    case TemporarilyUnavailable = 'temporarily_unavailable';
}
