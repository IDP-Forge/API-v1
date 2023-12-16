<?php

namespace App\Domain\OAuth2\Signing;

class Algorithms
{
    public const int A_HS256 = 1;
    public const int A_HS384 = 2;
    public const int A_HS512 = 3;
    public const int A_RS256 = 4;
    public const int A_RS384 = 5;
    public const int A_RS512 = 6;
    public const int A_ES256 = 7;
    public const int A_ES384 = 8;
    public const int A_ES512 = 9;

    public const array SIGNING_ALGORITHM_COLLECTION = [
        self::A_HS256 => [
            'asymmetric' => false,
            'title' => 'HS256',
            'description' => 'HMAC using SHA256 digest',
            'class' => \Lcobucci\JWT\Signer\Hmac\Sha256::class
        ],

        self::A_HS384 => [
            'asymmetric' => false,
            'title' => 'HS384',
            'description' => 'HMAC using SHA384 digest',
            'class' => \Lcobucci\JWT\Signer\Hmac\Sha384::class
        ],

        self::A_HS512 => [
            'asymmetric' => false,
            'title' => 'HS512',
            'description' => 'HMAC using SHA512 digest',
            'class' => \Lcobucci\JWT\Signer\Hmac\Sha512::class
        ],

        self::A_RS256 => [
            'asymmetric' => true,
            'title' => 'RS256',
            'description' => 'RSA (2048 or 4096 bits) using SHA256',
            'class' => \Lcobucci\JWT\Signer\Rsa\Sha256::class
        ],

        self::A_RS384 => [
            'asymmetric' => true,
            'title' => 'RS384',
            'description' => 'RSA (2048 or 4096 bits) using SHA384',
            'class' => \Lcobucci\JWT\Signer\Rsa\Sha384::class
        ],

        self::A_RS512 => [
            'asymmetric' => true,
            'title' => 'RS512',
            'description' => 'RSA (2048 or 4096 bits) using SHA512',
            'class' => \Lcobucci\JWT\Signer\Rsa\Sha512::class
        ],

        self::A_ES256 => [
            'asymmetric' => true,
            'title' => 'ES256',
            'description' => 'Elliptic Curve prime256v1',
            'class' => \Lcobucci\JWT\Signer\Ecdsa\Sha256::class
        ],

        self::A_ES384 => [
            'asymmetric' => true,
            'title' => 'ES384',
            'description' => 'Elliptic Curve secp384r1',
            'class' => \Lcobucci\JWT\Signer\Ecdsa\Sha384::class
        ],

        self::A_ES512 => [
            'asymmetric' => true,
            'title' => 'ES512',
            'description' => 'Elliptic Curve secp521r1',
            'class' => \Lcobucci\JWT\Signer\Ecdsa\Sha512::class
        ],
    ];
}
