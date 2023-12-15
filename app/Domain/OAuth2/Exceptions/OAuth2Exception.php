<?php

namespace App\Domain\OAuth2\Exceptions;

use Illuminate\Http\JsonResponse;

class OAuth2Exception extends \Exception
{
    public function __construct(
        public readonly ErrorCodeEnum $error_code,
        public readonly string $error_description,
        public readonly string $error_uri,
        string $message = '',
        int $code = 0,
        \Throwable $previous = null
    ){
        parent::__construct($message, $code, $previous);
    }

    public function render(): JsonResponse
    {
        return response()->json([
            'error' => $this->error_code,
            'error_description' => $this->error_description
        ], $this->code);
    }

    public static function invalidRequest(string $description = 'Request does not fit any of OAuth 2.0 defined grants.', int $code = 400)
    {
        throw new self(ErrorCodeEnum::InvalidRequest, $description, '', '', $code);
    }

    public static function invalidClient(string $description = 'Bad client configuration')
    {
        throw new self(ErrorCodeEnum::ServerError, $description, '', '', 500);
    }

    public static function serverError(string $description = 'Internal server error')
    {
        throw new self(ErrorCodeEnum::ServerError, $description, '', '', 500);
    }

    public static function clientNotLinkedToServer(string $description = 'Specified client has no access to requested resource server')
    {
        throw new self(ErrorCodeEnum::InvalidRequest, $description, '', '', 400);
    }

    public static function nonexistentClient(string $description = "Invalid client specified")
    {
        throw new self(ErrorCodeEnum::ServerError, $description, '', '', 404);
    }

    public static function inactiveClient(string $description = "Specified Client is marked as inactive.")
    {
        throw new self(ErrorCodeEnum::ServerError, $description, '', '', 400);
    }

    public static function invalidRedirectUri(string $description = 'Invalid redirect URI specified')
    {
        throw new self(ErrorCodeEnum::InvalidRequest, $description, '', '', 422);
    }

    public static function invalidAuthorizationCode(string $description = 'Invalid authorization code')
    {
        throw new self(ErrorCodeEnum::InvalidRequest, $description, '', '', 422);
    }

    public static function invalidRefreshToken(string $description = 'Invalid refresh token')
    {
        throw new self(ErrorCodeEnum::InvalidRequest, $description, '', '', 422);
    }

    public static function invalidData(string $description = 'Invalid issuer / audience')
    {
        throw new self(ErrorCodeEnum::AccessDenied, $description, '', '', 403);
    }

    public static function invalidSignature(string $description = 'Invalid signature')
    {
        throw new self(ErrorCodeEnum::AccessDenied, $description, '', '', 403);
    }

    public static function invalidToken(string $description = 'Invalid token')
    {
        throw new self(ErrorCodeEnum::AccessDenied, $description, '', '', 403);
    }

    public static function tokenExpired(string $description = 'Token expired')
    {
        throw new self(ErrorCodeEnum::AccessDenied, $description, '', '', 401);
    }

    public static function tokenRevoked(string $description = 'Token revoked')
    {
        throw new self(ErrorCodeEnum::AccessDenied, $description, '', '', 403);
    }
}
