<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Domain\IDPForge\ProtocolTypeEnum;

class Protocol extends Model
{
    public const PROTOCOL_OAUTH2_ID = 1;
    public const PROTOCOL_OIDC_ID = 2;
    public const PROTOCOL_SAML2_ID = 3;

    public const PROTOCOLS = [
        self::PROTOCOL_OAUTH2_ID => [
            'id' => self::PROTOCOL_OAUTH2_ID,
            'type' => ProtocolTypeEnum::AuthZ->value,
            'title' => 'OAuth 2.0 (Open Authorization v2.0)',
            'description' => 'OAuth 2.0 (Open Authorization) is an industry-standard protocol for authorization that enables third-party applications to access user data from a web service (such as a social media platform or an online service) without exposing the user\'s credentials. It is widely used for secure, delegated access in scenarios where a user grants one application or service permission to access resources on their behalf from another.',
            'metadata' => [
                'rfc' => 'https://datatracker.ietf.org/doc/html/rfc6749',
                'type' => 'authorization',
                'short_type' => 'authz'
            ]
        ],

        self::PROTOCOL_OIDC_ID => [
            'id' => self::PROTOCOL_OIDC_ID,
            'type' => ProtocolTypeEnum::AuthN->value,
            'title' => 'OpenID Connect Authentication Protocol',
            'description' => 'OpenID Connect (OIDC) is an identity layer on top of the OAuth 2.0 protocol. It provides a standard and interoperable way for clients (applications or services) to perform user authentication and obtain information about authenticated users. OpenID Connect is designed to address identity-related use cases, such as single sign-on (SSO) and identity federation, building on the foundation laid by OAuth 2.0.',
            'metadata' => [
                'rfc' => 'https://openid.net/specs/openid-connect-core-1_0.html',
                'type' => 'authentication',
                'short_type' => 'authn'
            ]
        ],

        self::PROTOCOL_SAML2_ID => [
            'id' => self::PROTOCOL_SAML2_ID,
            'type' => ProtocolTypeEnum::AuthN->value,
            'title' => 'SAML 2.0',
            'description' => 'Security Assertion Markup Language (SAML) is an XML-based open standard for exchanging authentication and authorization data between parties, in particular, between an identity provider (IdP) and a service provider (SP). SAML 2.0, the second version of the SAML standard, is widely used for single sign-on (SSO) and federated identity management.',
            'metadata' => [
                'rfc' => '',
                'type' => 'authentication',
                'short_type' => 'authn'
            ]
        ]
    ];

    protected $table = 'protocols';

    protected $casts = [
        'metadata' => 'array'
    ];
}
